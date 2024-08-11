<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionExport implements FromView
{

    public function __construct(
        public $data,
        public $type
    ) {}

    public function view(): View
    {
        return view('exports.transactions', [
            'data' => $this->data, 'type' => $this->type
        ]);
    }
}
