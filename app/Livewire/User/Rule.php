<?php

namespace App\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class Rule extends Component
{
    public $title = 'Aturan';
    
    public function render()
    {
        $data = Setting::where('name', 'rule')->first();
        return view('livewire.user.rule', ['data' => $data]);
    }
}
