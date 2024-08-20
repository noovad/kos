<?php

namespace App\Livewire\Admin;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class ChatMenu extends Component
{
    public $title = 'Chat';

    public $display = 'group';

    public function messageIndex()
    {
        $users = User::where('role', 'user')->has('room')->get();

        $userChats = $users->map(function ($user) {
            $lastMessage = Message::where('is_admin', false)
                ->where('is_group_chat', false)
                ->where(function ($query) use ($user) {
                    $query->where('sender_id', $user->id)
                        ->orWhere('receiver_id', $user->id);
                })
                ->latest('created_at') // Mengambil pesan terbaru
                ->first();

            return [
                'user' => $user->name,
                'message' => $lastMessage,
            ];
        });

        // Urutkan hasil berdasarkan waktu pesan terbaru
        $userChats = $userChats->sortByDesc(function ($chat) {
            return $chat['message'] ? $chat['message']->created_at : null;
        })->values();

        return $userChats;
    }

    public function render()
    {
        $chat = $this->messageIndex();

        return view('livewire.admin.chat-menu', ['chat' => $chat]);
    }
}
