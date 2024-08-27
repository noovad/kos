<?php

namespace App\Jobs;

use App\Enums\TransactionStatus;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        $users = User::has('room')->with('room')->get();

        $users->each(function ($user) {
            if (compareDate($user->start_date)) {
                $payload = [
                    'name' => $user->name,
                    'phone' => $user->phone,
                    'gross_amount' => $user->room->roomType->price,
                ];

                $payment = json_decode((new PaymentService())->createTransaction($payload)->getContent(), true);

                $transaction = Transaction::create(
                    [
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'amount' => $user->room->roomType->price,
                        'period' => date('Y-m-d'),
                        'due_date' => date('Y-m-d', strtotime($payment['expiry_time'])),
                        'status' => TransactionStatus::PENDING,
                        'description' => 'Pembayaran bulan ' . dateNow(),
                        'payment_code' => $payment['permata_va_number'],
                        'order_id' => $payment['order_id'],
                        'room' => $user->room->name,
                    ]
                );

                dispatch(new ReminderTransactionJob($transaction));

                sleep(1);
            }
        });
    }
}
