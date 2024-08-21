<?php

namespace App\Livewire\Admin;

use App\Exports\TransactionExport;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TransactionReport extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $title = 'Transaksi';

    public $display = 'monthly';

    public $year;

    public $month;

    public $pagination = 20;

    public function mount()
    {
        $this->month = date('m');
        $this->year = date('Y');
    }

    public function monthly()
    {
        $data = Transaction::selectRaw('*, SUM(amount) AS total_amount')
            ->whereYear('period', '=', $this->year)
            ->where('status', '!=', 'draft')
            ->whereMonth('period', '=', $this->month)
            ->orderBy('status', 'desc')
            ->groupBy('id');

        return $data;
    }

    public function yearly()
    {
        $data = Transaction::selectRaw("DATE_FORMAT(period, '%Y-%m') AS period, 
            COUNT(*) AS jumlah_tagihan,
            SUM(amount) AS total_tagihan,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) AS jumlah_terbayar,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN amount ELSE 0 END) AS total_terbayar,
            ROUND((SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) / COUNT(*)) * 100) AS persentase_pembayaran")
            ->whereYear('period', '=', $this->year)
            ->where('status', '!=', 'draft')
            ->groupByRaw("DATE_FORMAT(period, '%Y-%m')")->get();

        return $data;
    }

    public function export()
    {
        if ($this->display == 'monthly') {
            $data = $this->monthly()->get();
            $totalAmount = $data->sum('amount');
            $fileName = 'report-monthly-'.$this->month.'-'.$this->year.'.xlsx';
        } elseif ($this->display == 'yearly') {
            $data = $this->yearly();
            $totalAmount = $data->sum('total_terbayar');
            $fileName = 'report-yearly-'.$this->year.'.xlsx';
        }

        return Excel::download(new TransactionExport($data, $this->display, $totalAmount), $fileName.'.xlsx');
    }

    public function render()
    {
        $data = ($this->monthly())->paginate($this->pagination);
        $yearly = $this->yearly();
        $starting_number = ($data->currentPage() - 1) * $data->perPage() + 1;

        if ($this->display == 'monthly') {
            $totalAmount = $data->sum('amount');
        } elseif ($this->display == 'yearly') {
            $totalAmount = $yearly->sum('total_terbayar');
        }

        return view('livewire.admin.transaction-report', [
            'data' => $data,
            'starting_number' => $starting_number,
            'yearly' => $yearly,
            'totalAmount' => $totalAmount,
        ]);
    }
}
