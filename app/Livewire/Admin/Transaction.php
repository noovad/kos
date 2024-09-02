<?php

namespace App\Livewire\Admin;

use App\Models\Transaction as TransactionModel;
use Livewire\Component;

class Transaction extends Component
{
    public $title = 'Transaksi';

    public $page;

    public function monthlyFinancial()
    {
        $year = date('Y');

        $total_terbayar = array_fill(0, 12, 0);

        $yearly = TransactionModel::selectRaw("
            MONTH(period) as month,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN amount ELSE 0 END) AS total_terbayar")
            ->whereYear('period', '=', $year)
            ->groupByRaw("MONTH(period)")
            ->get();

        foreach ($yearly as $item) {
            $month = $item->month - 1;
            $total_terbayar[$month] = (int) $item->total_terbayar;
        }

        return $total_terbayar;
    }

    public function transaction()
    {
        $transactions = TransactionModel::selectRaw('status, COUNT(*) as count')
            ->where('status', '!=', 'draft')
            ->whereMonth('period', '=', date('m'))
            ->groupBy('status')
            ->get();

        $data = [];
        foreach ($transactions as $transaction) {
            $data['status'][] = $transaction->status;
            $data['count'][] = $transaction->count;
        }

        return $data;
    }

    public function render()
    {
        return view('livewire.admin.transaction',
            [
                'yearly' => $this->monthlyFinancial(),
                'transaction' => $this->transaction(),
            ]
        );
    }
}
