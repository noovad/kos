<?php

namespace App\Http\Controllers\Api;

use App\Enums\TransactionStatus;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MidtransController extends Controller
{
    // callback from midtrans
    public function callback(Request $request)
    {
        $transaction = Transaction::where('order_id', $request->order_id)->first();
        $signature_key = hash('sha512', $transaction->order_id . $request->status_code . $request->gross_amount . config('services.midtrans.serverKey'));

        if ($request->signature_key == $signature_key) {
            $transaction->update([
                'status' => TransactionStatus::mapStatus($request->transaction_status),
            ]);

            return response('OK', 200);
        }
    }
}
