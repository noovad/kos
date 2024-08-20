<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransactionExport implements FromView
{
    public function __construct(
        public $data,
        public $type,
        public $totalAmount
    ) {
    }

    public function view(): View
    {
        return view('exports.transactions', [
            'data' => $this->data,
            'type' => $this->type,
            'totalAmount' => $this->totalAmount,
        ]);
    }
}
