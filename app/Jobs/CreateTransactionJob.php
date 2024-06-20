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
                        'description' => 'Pembayaran bulan '.dateNow(),
                        'payment_code' => $payment['permata_va_number'],
                        'order_id' => $payment['order_id'],
                        'room' => $user->room->name,
                    ]
                );

                $message = sprintf("Kepada Pelanggan: *%s*\n\nKami mengingatkan Anda terkait tagihan kos bulan %s sebesar Rp *%s* yang harus dibayarkan. Mohon segera melakukan pembayaran sebelum tanggal jatuh tempo.\n\nDetail Tagihan:\n\nBulan Tagihan: %s\nJumlah Tagihan: %s\nKode Pembayaran: %s\n\nHarap segera lakukan pembayaran melalui transfer bank atau metode pembayaran yang tersedia. Terima kasih atas perhatian dan kerjasamanya.\n\nHormat kami,\n\n[Perusahaan/Kosan Anda]",
                    $user->name, dateNow(), number_format($user->room->roomType->price, 0, ',', '.'), dateNow(), number_format($user->room->roomType->price, 0, ',', '.'), $payment['permata_va_number']);
                SendWhatsappJob::dispatch($user->phone, $message);
            }
        });
    }
}
