<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $title = 'Profil';
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
