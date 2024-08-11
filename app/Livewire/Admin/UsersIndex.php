<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $title = 'Pengguna';

    public $pagination = 20;

    public $search;

    public $filter = 1;

    public function userActive()
    {
        $this->filter = 1;
        $this->resetPage();
    }

    public function userInactive()
    {
        $this->filter = 0;
        $this->resetPage();
    }

    public function update($id)
    {
        $this->dispatch('update-user', id: $id);
    }

    public function delete($userId)
    {
        try {
            User::find($userId)->delete();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dihapus.');
            $this->dispatch('close-modal-delete');
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dihapus.');
        }
    }

    #[On('user-created')]
    #[On('user-updated')]
    public function render()
    {
        $users = User::query();

        if ($this->filter == '1') {
            $users->whereNotNull('room_id')->Where('room_id', '!=', 0)->with('room')
            ->where('name', 'like', '%' . $this->search . '%');
        } elseif ($this->filter == '0') {
            $users->whereNull('room_id')->orWhere('room_id', 0);
        }

        $users = $users->orderBy('name')->paginate($this->pagination);
        $starting_number = ($users->currentPage() - 1) * $users->perPage() + 1;

        return view('livewire.admin.users-index', [
            'users' => $users,
            'starting_number' => $starting_number,
        ]);
    }
}
