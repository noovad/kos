<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

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

    public $userId;

    public function openUpdate($id)
    {
        $this->dispatch('update-admin', id: $id);
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

    #[On('admin-created')]
    #[On('admin-updated')]
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
