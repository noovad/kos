<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Chat extends Component
{
    public $title = 'Chat';
    public $display = 'group';
    public function render()
    {
        return view('livewire.admin.chat');
    }
}
