<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Room extends Component
{
    public $title = 'Kamar';
    
    public $page;

    public function render()
    {
        return view('livewire.admin.room');
    }
}
