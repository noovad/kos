<?php

namespace App\Livewire\Admin;

use App\Enums\TransactionStatus;
use App\Jobs\ReminderTransactionJob;
use App\Jobs\SendWhatsappJob;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymentService;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransactionPost extends Component
{
    use WithoutUrlPagination, WithPagination;

    public array $selected_items;

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
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
    }

    public function closeModal()
    {
        $this->dispatch('close-modal-create');
        $this->user_selected = '';
    }

    public function updateToUnpaid()
    {
        try {
            $data = Transaction::where('status', TransactionStatus::DRAFT)->update(['status' => TransactionStatus::PENDING]);
            $data->each(function ($transaction) {
                ReminderTransactionJob::dispatch($transaction->id);
            });
            
            noty()->timeout(1000)->progressBar(false)->addSuccess('Berhasil mengubah data.');
        } catch (\Throwable $th) {
            dd($th);
            noty()->timeout(1000)->progressBar(false)->addError('Gagal mengubah data.');
        }

        $this->dispatch('close-modal-update-all');
    }

    public function updateToUnpaidSelected()
    {
        if (empty($this->selected_items)) {
            noty()->timeout(1000)->progressBar(false)->addError('Tidak ada data yang dipilih.');
            return;
        }

        try {
            $data = Transaction::whereIn('id', $this->selected_items)->update(['status' => TransactionStatus::PENDING]);
            $data->each(function ($transaction) {
                ReminderTransactionJob::dispatch($transaction->id);
            });

            noty()->timeout(1000)->progressBar(false)->addSuccess('Berhasil mengubah data.');
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Gagal mengubah data.');
        }

        $this->selected_items = [];
        $this->dispatch('close-modal-update');
    }

    public function render()
    {

        $user = User::has('room')->where('id', $this->user_selected)->with('room')->first();
        $users = User::has('room')->get();

        $transaction = Transaction::orderBy('due_date')->where('status', TransactionStatus::DRAFT)->paginate(20);
        $starting_number = ($transaction->currentPage() - 1) * $transaction->perPage() + 1;

        return view('livewire.admin.transaction-post', ['users' => $users, 'user' => $user, 'transaction' => $transaction, 'starting_number' => $starting_number]);
    }
}
