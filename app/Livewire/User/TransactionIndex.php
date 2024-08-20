<?php

namespace App\Livewire\User;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransactionIndex extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $title = 'Tagihan';

    public $filter = 'belum dibayar';

    public $pagination = 20;

    public function update($id)
    {
        $this->dispatch('update-room', id: $id);
    }

    public function render()
    {
        // where user_id = auth()->id()
        $transaction = Transaction::where('user_id', auth()->id())->orderBy('due_date')->with('user');

        if ($this->filter) {
            $transaction = $transaction->where('status', $this->filter);
        }

        $transaction = $transaction->paginate($this->pagination);

        return view('livewire.user.transaction-index', ['transaction' => $transaction]);
    }
}
