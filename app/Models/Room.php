<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type_id',
        'name',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
