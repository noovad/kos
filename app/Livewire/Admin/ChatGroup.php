<?php

namespace App\Livewire\Admin;

use App\Models\Message;
use Livewire\Component;
use App\Jobs\SendMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class ChatGroup extends Component
{

    public $title = 'Chat - Group';
    public $message;

    public function messages()
    {
        $messages = Message::where('is_group_chat', true)
            ->oldest('created_at')
            ->get()
            ->groupBy(function ($date) {
                return $date->created_at->format('Y-m-d'); // Group by date
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
                'message' => $this->message,
                'is_group_chat' => true,
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
        return view('livewire.admin.chat-group', ['chat' => $chat]);
    }
}
