<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Transaction extends Component
{
    public $page;
    public function render()
    {
        return view('livewire.admin.transaction');
    }
}
