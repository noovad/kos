<?php

namespace App\Livewire\Admin;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransactionIndex extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $filter = '';

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
        $transaction = Transaction::orderBy('due_date')->with('user');

        if ($this->filter) {
            $transaction = $transaction->where('status', $this->filter);
        }

        $transaction = $transaction->paginate(20);

        return view('livewire.admin.transaction-index', ['transaction' => $transaction]);
    }
}
