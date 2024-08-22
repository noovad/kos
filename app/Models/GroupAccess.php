<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'last_access',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
