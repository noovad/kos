<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'amount',
        'due_date',
        'status',
        'description',
        'payment_code',
        'room_id',
        'room',
        'order_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
