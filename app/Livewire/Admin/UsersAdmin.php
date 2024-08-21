<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

use Illuminate\Validation\Rules;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Hash;

class UsersAdmin extends Component
{

    use WithoutUrlPagination, WithPagination;

    public $title = 'Admin';

    public $pagination = 20;

    public $search;

    public $name;

    public $password;

    public $password_confirmation;

    public $update_password = false;


    public function openUpdate($id)
    {
        $user = User::find($id);
        $this->name = $user->name;
        $this->dispatch('open-modal');
    }

    public function update($id)
    {
        if ($this->update_password) {
            $this->validate([
                'name' => ['required', 'string', 'max:255',  Rule::unique(User::class)->ignore($id)],
                'password' => ['required', 'string', 'confirmed', 'min:8', Rules\Password::defaults()],
            ]);
        } else {
            $this->validate([
                'name' => ['required', 'string', 'max:255',  Rule::unique(User::class)->ignore($id)],
            ]);
        }

        $user = User::find($id);
        $user->name = $this->name;
        if ($this->update_password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diupdate.');
        $this->dispatch('close-modal');
    }

    public function delete($userId)
    {
        try {
            User::find($userId)->delete();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dihapus.');
            $this->dispatch('close-modal-delete');
        } catch (\Throwable $th) {
            dd($th);
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dihapus.');
        }
    }

    public function render()
    {
        $users = User::query();

        $users->where('role', 'admin')->where(function ($query) {
            $query->where('users.name', 'like', '%' . $this->search . '%')
                ->orWhereHas('room', function ($q) {
                    $q->where('rooms.name', 'like', '%' . $this->search . '%');
                });
        });

        $users = $users->paginate($this->pagination);

        $starting_number = ($users->currentPage() - 1) * $users->perPage() + 1;

        return view('livewire.admin.users-admin', [
            'users' => $users,
            'starting_number' => $starting_number,
        ]);
    }
}
