<?php

namespace App\Enums;

enum TransactionStatus
{
    const DRAFT = 'Draft';

    const SETTLEMENT = 'Sudah Dibayar';

    const PENDING = 'Belum Dibayar';

    const DENY = 'Ditolak';

    const EXPIRE = 'Kadaluarasa';

    const CANCEL = 'Dibatalakan';

    public static function mapStatus($status)
    {
        switch (strtolower($status)) {
            case 'draft':
                return TransactionStatus::DRAFT;
            case 'settlement':
                return TransactionStatus::SETTLEMENT;
            case 'pending':
                return TransactionStatus::PENDING;
            case 'deny':
                return TransactionStatus::DENY;
            case 'expire':
                return TransactionStatus::EXPIRE;
            case 'cancel':
                return TransactionStatus::CANCEL;
            default:
                throw new \InvalidArgumentException('Status tidak valid');
        }
    }
}
