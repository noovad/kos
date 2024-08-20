<?php

namespace App\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class About extends Component
{
    public $title = 'Tentang Kami';

    public function render()
    {
        $data = Setting::where('name', 'about')->first();
        $nomor = Setting::where('name', 'telepon')->first();

        return view('livewire.user.about', ['data' => $data, 'nomor' => $nomor]);
    }
}
