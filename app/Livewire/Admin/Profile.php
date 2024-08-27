<?php

namespace App\Livewire\Admin;

use App\Jobs\CreateTransactionJob;
use App\Models\Setting;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $title = 'Profil';

    public $notif;

    public string $phone = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount()
    {
        $phone = Setting::where('name', 'telepon')->select('value')->first();
        $this->phone = preg_replace('/\+62(\d{3})(\d{4})(\d{4})/', '$1-$2-$3', $phone->value) ?? '';
    }

    public function trans() {
        CreateTransactionJob::dispatch();
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

        Setting::where('name', 'telepon')->update(['value' => $this->phone]);
        session()->flash('message', 'Nomor telepon berhasil diubah');
        $this->closeModal();
    }

    public function updateNotif()
    {
        Setting::where('name', 'notifikasi')->update(['value' => $this->notif]);
        session()->flash('message', 'Waktu notifikasi berhasil diubah');
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
        $this->dispatch('close-modal-update-notif');
    }

    public function render()
    {
        $user = Auth::user();
        $this->notif = (Setting::where('name', 'notifikasi')->first())->value;

        return view('livewire.admin.profile', [
            'user' => $user,
            'notif' => $this->notif,
        ]);
    }
}
