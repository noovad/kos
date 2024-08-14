<?php

namespace App\Livewire\User;

use Livewire\Component;

class Home extends Component
{
    public $title = 'Home';
    public function render()
    {
        return view('livewire.user.home');
    }
}
