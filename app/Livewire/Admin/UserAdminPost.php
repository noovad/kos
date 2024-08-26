<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class UserAdminPost extends Component
{

    public $userId;
    public $user;
    public $name;
    public $password;
    public $password_confirmation;
    public $update_data = false;
    public $update_password = false;

    #[On('update-admin')]
    public function openUpdate($id)
    {
        $this->userId = $id;
        $this->user = User::where('id', $id)->firstOrFail();
        $this->name = $this->user->name ?? '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->update_data = true;
        $this->dispatch('open-modal-create');
    }

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class, 'regex:/^[a-zA-Z0-9_]+$/'],
            'password' => ['required', 'string', 'confirmed', 'min:8', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated + ['role' => 'admin'])));

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
        $this->dispatch('close-modal-create');
        $this->dispatch('admin-created');
    }
    
    public function update()
    {
        $id = $this->userId;
        if ($this->update_password) {
            $this->validate([
                'name' => ['required', 'string', 'max:255',  Rule::unique(User::class)->ignore($id), 'regex:/^[a-zA-Z0-9_]+$/'],
                'password' => ['required', 'string', 'confirmed', 'min:8', Rules\Password::defaults()],
            ]);
        } else {
            $this->validate([
                'name' => ['required', 'string', 'max:255',  Rule::unique(User::class)->ignore($id), 'regex:/^[a-zA-Z0-9_]+$/'],
            ]);
        }

        $user = User::find($id);
        $user->name = $this->name;
        if ($this->update_password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diupdate.');
        $this->dispatch('close-modal-create');
        $this->dispatch('admin-updated');
        $this->update_data = false;
    }

    public function closeModal()
    {
        $this->update_data = false;
        $this->dispatch('close-modal-create');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.user-admin-post');
    }
}
