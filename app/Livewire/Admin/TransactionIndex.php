<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;

class TransactionIndex extends Component
{
    public $filter = '';

    public $empty = '';

    public function update($id)
    {
        $this->dispatch('update-room', id: $id);
    }

    public function delete($id)
    {
        try {
            Transaction::find($id)->delete();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dihapus.');
            $this->dispatch('close-modal-delete');
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dihapus.');
        }
    }

    #[On('transaction-created')]
    #[On('transaction-updated')]
    public function render()
    {
        // pagination
        $transaction = Transaction::orderBy('due_date')->with('user')->get();
        return view('livewire.admin.transaction-index', ['transaction' => $transaction]);
    }
}
