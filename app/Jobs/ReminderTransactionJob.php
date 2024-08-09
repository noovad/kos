<?php

namespace App\Jobs;

use App\Enums\TransactionStatus;
use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReminderTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $id,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $transaction = Transaction::where('id', $this->id)->get();
        $message = sprintf(
            "Kepada Pelanggan: *%s*\n\nKami mengingatkan Anda terkait tagihan kos bulan %s sebesar Rp *%s* yang harus dibayarkan. Mohon segera melakukan pembayaran sebelum tanggal jatuh tempo.\n\nDetail Tagihan:\n\nBulan Tagihan: %s\nJumlah Tagihan: %s\nKode Pembayaran: %s\n\nHarap segera lakukan pembayaran melalui transfer bank atau metode pembayaran yang tersedia. Terima kasih atas perhatian dan kerjasamanya.\n\nHormat kami,\n\n[Perusahaan/Kosan Anda]",
            $transaction->user_name,
            dateNow(),
            number_format($transaction->amount, 0, ',', '.'),
            dateNow(),
            number_format($transaction->amount, 0, ',', '.'),
            $transaction->payment_code
        );

        // validasi phone number
        if (!preg_match('/^\+628\d{10}$/', $transaction->user->phone)) {
            throw new \Exception('Invalid phone number format');
        }

        $job = new SendWhatsappJob($transaction->user->phone, $message);
        $job->handle();
    }
}
