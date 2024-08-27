<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use App\Jobs\ReminderCreateJob;
use App\Enums\TransactionStatus;
use App\Services\PaymentService;
use Livewire\WithoutUrlPagination;
use App\Jobs\ReminderTransactionJob;

class TransactionPost extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $title = 'Buat Tagihan';

    public $display = 'buat';

    public array $selected_items;

    public string $user_selected = '';

    public string $transaction_selected = '';

    public $price;

    public $description;

    public function create()
    {
        $this->validate([
            'user_selected' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);


        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();

        $payload = [
            'name' => $user->name,
            'phone' => $user->phone,
            'gross_amount' => $user->room->roomType->price,
        ];

        $price = str_replace(['.', ','], '', $this->price);
        $payment = json_decode((new PaymentService())->createTransaction($payload)->getContent(), true);


        try {
            $transaction = Transaction::create(
                [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'amount' => $price,
                    'period' => null,
                    'due_date' => $payment['expiry_time'],
                    'status' => TransactionStatus::PENDING,
                    'description' => $this->description,
                    'payment_code' => $payment['permata_va_number'],
                    'order_id' => $payment['order_id'],
                    'room' => $user->room->name,
                    'room_id' => $user->room->id,
                ]
            );
            dispatch(new ReminderCreateJob($transaction));

            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
            $this->dispatch('transaction-created');
            $this->dispatch('close-modal-create');

            $this->reset();
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
    }

    public function updateTransaction(){
        $this->validate([
            'transaction_selected' => 'required',
        ]);

        $transaction = Transaction::with('user')->where('id', $this->transaction_selected)->first();

        $payload = [
            'name' => $transaction->user_name,
            'phone' => $transaction->user->phone,
            'gross_amount' => $transaction->amount,
        ];

        $payment = json_decode((new PaymentService())->createTransaction($payload)->getContent(), true);

        $transaction->update([
            'status' => TransactionStatus::PENDING,
            'payment_code' => $payment['permata_va_number'],
            'order_id' => $payment['order_id'],
        ]);
        dispatch(new ReminderTransactionJob($transaction));

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');
        $this->reset();
        $this->display = 'perbarui';
    }



    public function render()
    {
        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();
        $transaction = Transaction::where('id', $this->transaction_selected)->first();
        $expire = Transaction::where('status', 'tidak dibayar')->latest()->get();
        $users = User::has('room')->get();

        return view('livewire.admin.transaction-post', [
            'users' => $users,
            'user' => $user,
            'expire' => $expire,
            'transaction' => $transaction,
        ]);
    }
}
