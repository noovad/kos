<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $title = 'Profil';

    public string $phone = '';

    public string $password = '';

    public string $password_confirmation = '';


    public function mount()
    {
        $this->phone = preg_replace('/\+62(\d{3})(\d{4})(\d{4})/', '$1-$2-$3', Auth::user()->phone) ?? '';
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function updatePhone()
    {
        $this->validate([
            'phone' => ['required', 'regex:/\d{3}-\d{4}-\d{4}/'],
        ]);

        $user = Auth::user();
        $user->phone = '+62'.preg_replace('/-/', '', $this->phone);
        if ($user instanceof User) {
            $user->save();
        }
        session()->flash('message', 'Nomor telepon berhasil diubah');
        $this->closeModal();
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();
        $user->password = bcrypt($this->password);

        if ($user instanceof User) {
            $user->save();
        }
        session()->flash('message', 'Password berhasil diubah');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal-update-phone');
        $this->dispatch('close-modal-update-password');
    }

    public function render()
    {
        $user = Auth::user();

        return view('livewire.user.profile', [
            'user' => $user
        ]);
    }
}
