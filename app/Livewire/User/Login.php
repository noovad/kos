<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->form->validate();
        if (Auth::attempt(['name' => $this->form->name, 'password' => $this->form->password])) {
            Session::regenerate();
        } else {
            throw ValidationException::withMessages([
                'login' => 'Login failed, please check your username and password.',
            ]);
        }

        if (auth()->user()->role == 'admin') {
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->intended('/');
        }
    }

    public function render()
    {
        return view('livewire.user.login');
    }
}
