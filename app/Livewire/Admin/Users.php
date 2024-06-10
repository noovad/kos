<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Users extends Component
{
    public $filter = '';

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
        $users = User::query()->with('room');

        if ($this->filter == '1') {
            $users->whereNotNull('room_id');
        } elseif ($this->filter == '0') {
            $users->whereNull('room_id');
        }

        $users = $users->get();

        return view('livewire.admin.users', ['users' => $users]);
    }
}
