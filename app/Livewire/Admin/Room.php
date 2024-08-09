<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Room extends Component
{
    public $page = 'page';

    public function render()
    {
        return view('livewire.admin.room');
    }
}
