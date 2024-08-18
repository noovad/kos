<?php

namespace App\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class Home extends Component
{
    public $title = 'Home';
    public function render()
    {
        $data = Setting::where('name', 'description')->first();
        return view('livewire.user.home', ['data' => $data]);
    }
}
