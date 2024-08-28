<?php

namespace App\Jobs;

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
        public Transaction $transaction,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $message = sprintf(
            "Kepada Pelanggan: *%s*\n\nKami mengingatkan Anda terkait tagihan kos bulan ini (%s)  sebesar Rp *%s* yang harus dibayarkan. Mohon segera melakukan pembayaran sebelum tanggal jatuh tempo.\n\nDetail Tagihan:\nTanggal Jatuh Tempo: %s\nJumlah Tagihan: %s\nKode Pembayaran: %s\n\nHarap segera lakukan pembayaran melalui pembayaran. Terima kasih atas perhatian dan kerjasamanya.",
            $this->transaction->user_name,
            date('m-Y', strtotime($this->transaction->period)),
            number_format($this->transaction->amount, 0, ',', '.'),
            date('d-m-Y', strtotime($this->transaction->due_date)),
            number_format($this->transaction->amount, 0, ',', '.'),
            $this->transaction->payment_code
        );

        if (preg_match('/^\+628\d{9,10}$/', $this->transaction->user->phone)) {
            dispatch(new SendWhatsappJob($this->transaction->user->phone, $message));
        } else {
            echo "Nomor telepon tidak valid";
        }
    }
}
