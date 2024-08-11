<?php

namespace App\Livewire\Admin;

use App\Exports\TransactionExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaction;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class TransactionReport extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $display = 'monthly';
    public $year;
    public $month;
    public $paginate = 10; // Set a default value for pagination

    public function mount()
    {
        $this->month = date('m');
        $this->year = date('Y');
    }

    public function export()
    {
        if ($this->display == 'monthly') {
            $data = Transaction::whereYear('period', '=', $this->year)
            ->where('status', '!=', 'draft')
            ->whereMonth('period', '=', $this->month)
            ->orderBy('status', 'desc')
            ->get();
            $fileName = 'report-monthly-'.$this->month.'-'.$this->year.'.xlsx';
        } else {
            $data = Transaction::selectRaw("DATE_FORMAT(period, '%Y-%m') AS period, 
            COUNT(*) AS jumlah_tagihan,
            SUM(amount) AS total_tagihan,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) AS jumlah_terbayar,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN amount ELSE 0 END) AS total_terbayar,
            ROUND((SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) / COUNT(*)) * 100) AS persentase_pembayaran")
            ->whereYear('period', '=', $this->year)
            ->groupByRaw("DATE_FORMAT(period, '%Y-%m')")
            ->get();
            $fileName = 'report-yearly-'.$this->year.'.xlsx';
        }

        return Excel::download(new TransactionExport($data, $this->display), $fileName.'.xlsx');
    }

    public function render()
    {
        $data = Transaction::whereYear('period', '=', $this->year)
            ->where('status', '!=', 'draft')
            ->whereMonth('period', '=', $this->month)
            ->orderBy('status', 'desc')
            ->paginate($this->paginate);

        $yearly = Transaction::selectRaw("DATE_FORMAT(period, '%Y-%m') AS period, 
            COUNT(*) AS jumlah_tagihan,
            SUM(amount) AS total_tagihan,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) AS jumlah_terbayar,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN amount ELSE 0 END) AS total_terbayar,
            ROUND((SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) / COUNT(*)) * 100) AS persentase_pembayaran")
            ->whereYear('period', '=', $this->year)
            ->groupByRaw("DATE_FORMAT(period, '%Y-%m')")
            ->get();

        $starting_number = ($data->currentPage() - 1) * $data->perPage() + 1;
        return view('livewire.admin.transaction-report', ['data' => $data, 'starting_number' => $starting_number, 'yearly' => $yearly]);
    }
}
