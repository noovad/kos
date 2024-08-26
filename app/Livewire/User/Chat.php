<?php

namespace App\Livewire\User;

use App\Models\Message;
use Livewire\Component;
use App\Events\GotMessage;
use App\Events\IndicatorEvent;
use App\Models\GroupAccess;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Chat extends Component
{
    public $display;
    public $message;

    protected function getMessages($isGroup = false)
    {
        return Message::where('is_group', $isGroup)
            ->where('is_admin', false)
            ->when(!$isGroup, function ($query) {
                $query->where(function ($query) {
                    $query->where('sender_id', Auth::id())
                        ->orWhere('receiver_id', Auth::id());
                });
            })
            ->oldest('created_at')
            ->get()
            ->groupBy(fn($message) => $message->created_at->format('Y-m-d'));
    }

    public function chat()
    {
        return $this->getMessages(false);
    }

    public function group()
    {
        return $this->getMessages(true);
    }

    public function sendMessage()
    {
        
        if (empty($this->message)) {
            return;
        }
        
        IndicatorEvent::dispatch('Perbarui Indicator');
        GotMessage::dispatch($this->message);

        try {
            Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => null,
                'message' => $this->message,
                'is_group' => $this->display == 'group',
            ]);
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['message' => 'Pesan gagal dikirim.']);
        }

        $this->message = '';
    }

    public function update($display)
    {
        IndicatorEvent::dispatch('Perbarui Indicator');
        $this->display = $display;

        if ($display == 'group') {
            GroupAccess::updateOrCreate([
                'type' => 'group',
                'user_id' => Auth::id(),
            ], [
                'last_access' => now(),
            ]);
        } else {
            $chat = $this->chat();
            $lastMessage = $chat->last()?->last();

            if ($lastMessage && $lastMessage->receiver_id == Auth::id()) {
                $lastMessage->update(['is_read' => true]);
            }
        }
    }

    #[On('echo:chatroom,GotMessage')]
    public function render()
    {
        $chat = $this->chat();
        $group = $this->group();

        $lastMessage = $chat->last()?->last();
        $isReadChat = $lastMessage && (
            $lastMessage->sender_id == Auth::id() || $lastMessage->is_read
        );

        $lastGroupMessage = Message::where('is_admin', false)
            ->where('is_group', true)
            ->latest('created_at')
            ->first();

        $groupIndicator = false;
        if ($groupAccess = GroupAccess::where('user_id', Auth::id())->where('type', 'group')->first()) {
            if ($lastGroupMessage && $lastGroupMessage->sender_id != Auth::id()) {
                $groupIndicator = $lastGroupMessage->created_at > $groupAccess->last_access;
            }
        }

        return view('livewire.user.chat', [
            'chat' => $chat,
            'group' => $group,
            'is_read_chat' => $isReadChat,
            'group_indicator' => $groupIndicator,
        ]);
    }
}
