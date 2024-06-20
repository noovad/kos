<?php

namespace App\Livewire\Admin;

use App\Enums\TransactionStatus;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymentService;
use Livewire\Component;

class TransactionPost extends Component
{
    public Transaction $transaction;

    public User $userUp;

    public string $user_selected = '';

    public function create()
    {
        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();

        $payload = [
            'name' => $user->name,
            'phone' => $user->phone,
            'gross_amount' => $user->room->roomType->price,
        ];

        $payment = json_decode((new PaymentService())->createTransaction($payload)->getContent(), true);

        // update start date dan description
        try {
            Transaction::create(
                [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'amount' => $user->room->roomType->price,
                    'due_date' => generateDueDate($user->start_date),
                    'status' => TransactionStatus::PENDING,
                    'description' => 'Pembayaran bulan '.dateNow(),
                    'payment_code' => $payment['permata_va_number'],
                    'order_id' => $payment['order_id'],
                    'room' => $user->room->name,
                    'room_id' => $user->room->id,
                ]
            );
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
            $this->dispatch('transaction-created');
            $this->dispatch('close-modal-create');
        } catch (\Throwable $th) {
            dd($th);
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
    }

    public function closeModal()
    {
        $this->dispatch('close-modal-create');
        $this->user_selected = '';
    }

    public function render()
    {
        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();
        $users = User::has('room')->get();

        return view('livewire.admin.transaction-post', ['users' => $users, 'user' => $user]);
    }
}
