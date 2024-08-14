<?php

namespace App\Livewire\User;

use App\Models\Message;
use Livewire\Component;
use App\Jobs\SendMessage;

class Chat extends Component
{
    public $title = 'Chat';
    public $display = 'group';

    public function messages() {
        $messages = Message::with('user')->get()->append('time');
    }

    public function message(){
        $message = Message::create([
            'user_id' => 12,
            'type' => 'admin',
            'text' => "abc",
        ]);
        SendMessage::dispatch($message);
    }

    public function render()
    {
        return view('livewire.user.chat');
    }
}
