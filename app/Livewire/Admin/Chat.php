<?php

namespace App\Livewire\Admin;

use App\Events\GotMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{
    public $title;

    public $message;

    public $receiver;

    public function mount(string $name): void
    {
        $this->title = 'Chat - '.$name;
        if ($name != 'admin' && $name != 'group') {
            $user = User::where('name', $name)->first();
            if ($user) {
                $this->receiver = $user->id;
            }
        } else {
            $this->receiver = $name;
        }
    }

    public function messages()
    {
        if ($this->receiver == 'group') {
            $messages = Message::where('is_group_chat', true)
                ->where('is_admin', false)
                ->oldest('created_at')
                ->get()
                ->groupBy(function ($message) {
                    return $message->created_at->format('Y-m-d');
                });
        } elseif ($this->receiver == 'admin') {
            $messages = Message::where('is_admin', true)
                ->oldest('created_at')
                ->get()
                ->groupBy(function ($message) {
                    return $message->created_at->format('Y-m-d');
                });
        } else {
            $messages = Message::where('is_admin', false)
                ->where('is_group_chat', false)
                ->where(function ($query) {
                    $query->where('sender_id', $this->receiver)
                        ->orWhere('receiver_id', $this->receiver);
                })
                ->oldest('created_at')
                ->get()
                ->groupBy(function ($message) {
                    return $message->created_at->format('Y-m-d');
                });
        }

        return $messages;
    }

    public function sendMessage()
    {
        if (empty($this->message)) {
            return;
        }

        GotMessage::dispatch($this->message);

        try {
            if ($this->receiver == 'group') {
                Message::create([
                    'sender_id' => Auth::id(),
                    'message' => $this->message,
                    'is_group_chat' => true,
                    'is_admin' => false,
                ]);
            } elseif ($this->receiver == 'admin') {
                Message::create([
                    'sender_id' => Auth::id(),
                    'message' => $this->message,
                    'is_group_chat' => false,
                    'is_admin' => true,
                ]);
            } else {
                Message::create([
                    'sender_id' => Auth::id(),
                    'receiver_id' => $this->receiver,
                    'message' => $this->message,
                    'is_group_chat' => false,
                    'is_admin' => false,
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
        $chat = $this->messages();

        return view('livewire.admin.chat', ['chat' => $chat, 'user' => $this->receiver]);
    }
}
