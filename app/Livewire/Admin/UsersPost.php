<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoomForm;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;

class UsersPost extends Component
{
    public string $name;
    public string $email;

    public string $password;
    public string $password_confirmation;

    public string $room_id;

    public int $userId;

    public User $user;

    public $update_data = false;

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);


        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
        $this->dispatch('user-created');
        $this->dispatch('close-modal-create');
    }

    #[On('update-user')]
    public function openUpdate($id)
    {
        $this->userId = $id;
        $this->user = User::where('id', $id)->firstOrFail();
        $this->name = $this->user->name ?? '';
        $this->email = $this->user->email ?? '';
        $this->password = '';
        $this->password_confirmation = '';

        $this->update_data = true;
        $this->dispatch('open-modal-create');
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($this->userId)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->userId)],
            'password' => ['string', 'confirmed', Rules\Password::defaults()],
            'room_id' => ['nullable'],
        ]);

        // dd($validated);
        try {
            $this->user->update($validated);

            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');
            $this->dispatch('close-modal-create');
            $this->dispatch('user-updated');

            $this->update_data = false;
        } catch (\Throwable $th) {

            noty()->timeout(1000)->progressBar(false)->addError('Data gagal diperbarui.');
        }
        $this->reset();
    }

    public function closeModal()
    {
        $this->update_data = false;
        $this->dispatch('close-modal-create');
        $this->reset();
    }
    public function render()
    {
        $tipe = Room::latest()->get();
        return view('livewire.admin.users-post', ['tipe' => $tipe]);
    }
}
