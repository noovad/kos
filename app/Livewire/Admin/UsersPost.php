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

    public string $phone = '88123123123';

    public string $phone_format;

    public string $password = '12312344';

    public string $password_confirmation = '12312344';

    public $room_id = null;

    public string $room_id_update;

    public string $room_name_update;

    public string $start_date;

    public int $userId;

    public User $user;

    public $update_data = false;

    public $update_password = false;

    public function register()
    {
        $this->room_id == '0' ? $this->room_id = null : $this->room_id;
        $this->phone = '+62'.preg_replace('/-/', '', $this->phone_format);
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:14', 'min:14', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'room_id' => ['nullable'],
            'start_date' => $this->room_id ? ['required', 'date_format:Y-m-d'] : ['nullable'],
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
        $this->room_id = $this->user->room_id ?? '';
        $this->room_id_update = $this->user->room->id ?? '';
        $this->room_name_update = $this->user->room->name ?? '';
        $this->name = $this->user->name ?? '';
        $this->phone_format = preg_replace('/\+62(\d{3})(\d{4})(\d{4})/', '$1-$2-$3', $this->user->phone) ?? '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->start_date = $this->user->start_date ?? '';

        $this->update_data = true;
        $this->dispatch('open-modal-create');
    }

    public function update()
    {
        $this->room_id == '0' || $this->room_id == null ? $this->room_id = null : $this->room_id;
        $this->phone = '+62'.preg_replace('/-/', '', $this->phone_format);
        $validated = [];

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($this->userId)],
            'phone' => ['required', 'string', 'max:14', 'min:14', Rule::unique(User::class)->ignore($this->userId)],
            'room_id' => ['nullable'],
        ], [
            'phone.max' => 'Invalid phone number',
            'phone.min' => 'Invalid phone number',
        ]);

        if ($this->room_id) {
            $this->validate([
                'start_date' => ['required', 'date_format:Y-m-d'],
            ]);
            $validated['start_date'] = $this->start_date;
        } else {
            $validated['start_date'] = null;
        }
        
        if ($this->update_password) {
            $passwordValidated = $this->validate([
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        try {
            $this->user->update($validated);
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');

            if ($this->update_password) {
                $this->user->update(['password' => Hash::make($passwordValidated['password'])]);
            }

            $this->dispatch('close-modal-create');
            $this->dispatch('user-updated');
            $this->update_data = false;
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal diperbarui.');
        }
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
