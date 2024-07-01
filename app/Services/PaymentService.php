<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\CoreApi;

class PaymentService
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction($payload)
    {
        $orderId = uniqid();
        $grossAmount = $payload['gross_amount'];

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
        ];

        $customerDetails = [
            'first_name' => $payload['name'],
            'phone' => $payload['phone'],
        ];

        $transaction = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'payment_type' => 'bank_transfer',
            'enabled_payments' => ['bsi'],
        ];

        try {
            $chargeResponse = CoreApi::charge($transaction);

            return response()->json($chargeResponse);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
