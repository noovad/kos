<?php

namespace App\Livewire\User;

use App\Models\Message;
use Livewire\Component;
use App\Events\GotMessage;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Chat extends Component
{
    public $title = 'Chat';
    public $display = 'group';
    public $message;

    public function chat()
    {
        $messages = Message::where('is_admin', false)
                ->where('is_group_chat', false)
                ->where(function ($query) {
                    $query->where('sender_id', Auth::id())
                        ->orWhere('receiver_id', Auth::id());
                })
                ->oldest('created_at')
                ->get()
                ->groupBy(function ($message) {
                    return $message->created_at->format('Y-m-d');
                });

        return $messages;
    }

    public function group()
    {
        $messages = Message::where('is_group_chat', true)
            ->where('is_admin', false)
            ->oldest('created_at')
            ->get()
            ->groupBy(function ($message) {
                return $message->created_at->format('Y-m-d');
            });

        return $messages;
    }

    public function sendMessage()
    {
        if (empty($this->message)) {
            return;
        }

        GotMessage::dispatch($this->message);

        try {
            if ($this->display == 'group') {
                Message::create([
                    'sender_id' => Auth::id(),
                    'message' => $this->message,
                    'is_group_chat' => true,
                ]);
            } else {
                Message::create([
                    'sender_id' => Auth::id(),
                    'receiver_id' => 1,
                    'message' => $this->message,
                    'is_group_chat' => false,
                ]);
            }
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'message' => 'Pesan gagal dikirim.',
            ]);
        }

        $this->message = '';
    }

    #[On('echo:chatroom,GotMessage')]
    public function render()
    {
        $chat = $this->group();
        $group = $this->chat();
        return view('livewire.user.chat', ['chat' => $chat, 'group' => $group]);
    }
}
