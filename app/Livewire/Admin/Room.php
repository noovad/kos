<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Room extends Component
{
    public $title = 'Room';
    public $page;

    public function render()
    {
        return view('livewire.admin.room');
    }
}
