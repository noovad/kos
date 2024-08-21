<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Transaction;

class HeaderUser extends Component
{
    public function render()
    {
        $not = Transaction::where('user_id', auth()->id())->where('status', 'tidak dibayar')->count();
        $notYet = Transaction::where('user_id', auth()->id())->where('status', 'belum dibayar')->count();

        if ($not > 0) {
            $indicator = 'danger';
        } elseif ($notYet > 0) {
            $indicator = 'warning';
        } else {
            $indicator = 'success';
        }
        
        return view('livewire.components.header-user', ['indicator' => $indicator]);
    }
}
