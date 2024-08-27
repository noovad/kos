<?php

namespace App\Jobs;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ReminderCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Transaction $transaction)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $message = sprintf(
            "Kepada Pelanggan: *%s*\n\nKami mengingatkan Anda terkait tagihan kos (%s)  sebesar Rp *%s* yang harus dibayarkan. Mohon segera melakukan pembayaran sebelum tanggal jatuh tempo.\n\nDetail Tagihan:\nTanggal Jatuh Tempo: %s\nJumlah Tagihan: %s\nKode Pembayaran: %s\n\nHarap segera lakukan pembayaran melalui pembayaran. Terima kasih atas perhatian dan kerjasamanya.",
            $this->transaction->user_name,
            $this->transaction->description,
            number_format($this->transaction->amount, 0, ',', '.'),
            date('d-m-Y', strtotime($this->transaction->due_date)),
            number_format($this->transaction->amount, 0, ',', '.'),
            $this->transaction->payment_code
        );

        if (preg_match('/^\+628\d{10}$/', $this->transaction->user->phone)) {
            dispatch(new SendWhatsappJob($this->transaction->user->phone, $message));
        }
    }
}
