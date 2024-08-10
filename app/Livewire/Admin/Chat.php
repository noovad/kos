<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Chat extends Component
{
    public $display = 'group'
    ;
    public function render()
    {
        return view('livewire.admin.chat');
    }
}
