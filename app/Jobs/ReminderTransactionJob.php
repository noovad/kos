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
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = Transaction::where('status', TransactionStatus::PENDING)->get();
        $data->each(function ($transaction) {
            $message = sprintf("Kepada Pelanggan: *%s*\n\nKami mengingatkan Anda terkait tagihan kos bulan %s sebesar Rp *%s* yang harus dibayarkan. Mohon segera melakukan pembayaran sebelum tanggal jatuh tempo.\n\nDetail Tagihan:\n\nBulan Tagihan: %s\nJumlah Tagihan: %s\nKode Pembayaran: %s\n\nHarap segera lakukan pembayaran melalui transfer bank atau metode pembayaran yang tersedia. Terima kasih atas perhatian dan kerjasamanya.\n\nHormat kami,\n\n[Perusahaan/Kosan Anda]",
                $transaction->user_name, dateNow(), number_format($transaction->amount, 0, ',', '.'), dateNow(), number_format($transaction->amount, 0, ',', '.'), $transaction->payment_code);
            $job = new SendWhatsappJob($transaction->user->phone, $message);
            $job->handle();
        });
    }
}
