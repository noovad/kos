<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.admin.profile');
    }
}
