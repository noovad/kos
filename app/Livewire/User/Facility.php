<?php

namespace App\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class Facility extends Component
{
    public $title = 'Fasilitas';
    public function render()
    {
        $data = Setting::where('name', 'facility')->first();
        return view('livewire.user.facility', ['data' => $data]);
    }
}
