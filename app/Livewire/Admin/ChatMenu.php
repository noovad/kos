<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\GroupAccess;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class ChatMenu extends Component
{
    public $title = 'Chat';
    public $display = 'group';

    public function messageIndex()
    {
        return User::where('role', 'user')
            ->has('room')
            ->get()
            ->map(function ($user) {
                $lastMessage = Message::where('is_admin', false)
                    ->where('is_group', false)
                    ->where(function ($query) use ($user) {
                        $query->where('sender_id', $user->id)
                            ->orWhere('receiver_id', $user->id);
                    })
                    ->latest('created_at')
                    ->first();

                return [
                    'user' => $user->name,
                    'message' => $lastMessage,
                    'is_read' => $lastMessage ? ($lastMessage->sender_id != $user->id || $lastMessage->is_read) : false,
                ];
            })
            ->sortByDesc(fn($chat) => $chat['message']?->created_at)
            ->values();
    }

    #[On('echo:chatroom,GotMessage')]
    public function render()
    {
        $lastGroupMessage = Message::where('is_admin', false)
            ->where('is_group', true)
            ->latest('created_at')
            ->first();

        $groupIndicator = true;

        if ($groupAccess = GroupAccess::where('user_id', Auth::id())->where('type', 'group')->first()) {
            if ($lastGroupMessage) {
                $groupIndicator = $lastGroupMessage->sender_id != Auth::id()
                    && $lastGroupMessage->created_at > $groupAccess->last_access;
            } else {
                $groupIndicator = false;
            }
        }

        $lastAdminMessage = Message::where('is_admin', true)
            ->where('is_group', false)
            ->latest('created_at')
            ->first();

        $adminIndicator = true;

        if ($adminAccess = GroupAccess::where('user_id', Auth::id())->where('type', 'admin')->first()) {
            if ($lastAdminMessage) {
                $adminIndicator = $lastAdminMessage->sender_id != Auth::id()
                    && $lastAdminMessage->created_at > $adminAccess->last_access;
            } else {
                $adminIndicator = false;
            }
        }

        return view('livewire.admin.chat-menu', [
            'chat' => $this->messageIndex(),
            'groupIndicator' => $groupIndicator,
            'adminIndicator' => $adminIndicator,
            'lastGroupMessage' => $lastGroupMessage,
            'lastAdminMessage' => $lastAdminMessage,
        ]);
    }
}
