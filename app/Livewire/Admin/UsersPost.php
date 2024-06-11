<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Livewire\Attributes\On;
use Livewire\Component;

class UsersPost extends Component
{
    public string $name = 'user';

    public string $email = 'user@email.com';

    public string $password = '12312344';

    public string $password_confirmation = '12312344';

    public string $room_id;

    public string $room_id_update;

    public string $room_name_update;

    public int $userId;

    public User $user;

    public $update_data = false;

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
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
        $this->user = User::where('id', $id)->with('room')->firstOrFail();
        $this->room_id_update = optional($this->user->room)->id ?? '';
        $this->room_name_update = optional($this->user->room)->name ?? '';
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
        $tipe = Room::orderBy('name')->doesntHave('user')->get();

        return view('livewire.admin.users-post', ['tipe' => $tipe]);
    }
}
