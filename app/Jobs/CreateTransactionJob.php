<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use App\Enums\TransactionStatus;
use App\Services\PaymentService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::has('room')->with('room')->first();

        //send whatsapp and use websocket
        $users->each(function ($user) {
            if (compareDate($user->start_date)) {
                $payload = [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'gross_amount' => $user->room->roomType->price,
                ];

                $payment = json_decode((new PaymentService())->createTransaction($payload)->getContent(), true);

                Transaction::create(
                    [
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'amount' => $user->room->roomType->price,
                        'due_date' => generateDueDate($user->room->start_date),
                        'status' => TransactionStatus::PENDING,
                        'description' => 'Pembayaran bulan ' . dateNow(),
                        'payment_code' => $payment['permata_va_number'],
                        'order_id' => $payment['order_id'],
                        'room' => $user->room->name,
                    ]
                );
            }
        });
    }
}
