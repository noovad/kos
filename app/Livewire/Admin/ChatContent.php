<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class ChatContent extends Component
{
    public $title = 'Chat';
    public function render()
    {
        return view('livewire.admin.chat-content');
    }
}
