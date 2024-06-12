<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use App\Livewire\Forms\TransactionForm;
use App\Models\Room;

class TransactionPost extends Component
{
    public Transaction $transaction;
    public User $userUp;

    public string $user_selected = "";
    public $update_data = false;

    public function create()
    {
        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();

        // update start date dan description
        try {
            Transaction::create(
                [
                    'user_id' => $this->user_selected,
                    'amount' => $user->room->roomType->price,
                    'due_date' => $user->start_date,
                    'status' => 'Menunggu Pembayaran',
                    'description' => 'Pembayaran bulanan.'
                ]
            );
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
            $this->dispatch('transaction-created');
            $this->dispatch('close-modal-create');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
    }

    #[On('update-transaction')]
    public function openUpdate($id)
    {
        $this->transaction = Transaction::where('id', $id)->with('room')->firstOrFail();
        $this->update_data = true;
        $this->dispatch('open-modal-create');
    }

    public function update()
    {
        $validate = ($this->form->validate());
        try {
            $this->transaction->update($validate);

            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');
            $this->dispatch('close-modal-create');
            $this->dispatch('transaction-updated');

            $this->update_data = false;
        } catch (\Throwable $th) {

            noty()->timeout(1000)->progressBar(false)->addError('Data gagal diperbarui.');
        }
        $this->form->reset();
    }

    public function closeModal()
    {
        $this->update_data = false;
        $this->dispatch('close-modal-create');
        $this->user_selected = "";
    }

    public function render()
    {
        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();
        $users = User::has('room')->get();
        return view('livewire.admin.transaction-post', ['users' => $users, 'user' => $user]);
    }
}
