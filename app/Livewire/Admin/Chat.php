<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Jobs\SendMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Chat extends Component
{
    public $title;
    public $message;
    public $receiver;

    public function mount(string $name): void
    {
        $this->title = 'Chat - ' . $name;
        $this->receiver = User::where('name', $name)->first()->id;
    }

    public function messages()
    {
        $authId = Auth::id();
        $userId = $this->receiver;

        $messages = Message::where('is_group_chat', false)
            ->where(function ($query) use ($authId, $userId) {
                $query->where(function ($subQuery) use ($authId, $userId) {
                    $subQuery->where('receiver_id', $authId)
                        ->where('sender_id', $userId);
                })
                    ->orWhere(function ($subQuery) use ($authId, $userId) {
                        $subQuery->where('sender_id', $authId)
                            ->where('receiver_id', $userId);
                    });
            })
            ->oldest('created_at')
            ->with('sender', 'receiver')
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

        try {
            $message = Message::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $this->receiver,
                'message' => $this->message,
                'is_group_chat' => false,
            ]);

            SendMessage::dispatch($message);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'message' => 'Pesan gagal dikirim.',
            ]);
        }

        $this->message = '';
    }

    public function render()
    {
        $chat = $this->messages();
        // dd($chat);
        return view('livewire.admin.chat', ['chat' => $chat]);
    }
}
