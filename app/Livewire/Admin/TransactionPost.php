<?php

namespace App\Livewire\Admin;

use App\Enums\TransactionStatus;
use App\Jobs\ReminderTransactionJob;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymentService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransactionPost extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $title = 'Buat Tagihan';

    public array $selected_items;

    public string $user_selected = '';

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
            Transaction::create(
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

            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
            $this->dispatch('transaction-created');
            $this->dispatch('close-modal-create');

            $this->reset();
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
    }


   
    public function render()
    {

        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();
        $users = User::has('room')->get();

        return view('livewire.admin.transaction-post', ['users' => $users, 'user' => $user]);
    }
}
