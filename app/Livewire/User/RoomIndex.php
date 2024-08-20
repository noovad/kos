<?php

namespace App\Livewire\User;

use App\Models\RoomType;
use Livewire\Component;

class RoomIndex extends Component
{
    public $title = 'Tipe Kamar';

    public function roomType()
    {
        $roomtype = RoomType::has('rooms')->with('rooms.user')->get();

        foreach ($roomtype as $type) {
            // Cek apakah setidaknya ada satu ruangan yang tidak memiliki pengguna
            $type->available = $type->rooms->contains(function ($room) {
                return $room->user === null;
            });
        }

        return $roomtype;
    }

    public function render()
    {
        $roomtype = $this->roomType();

        // dd($roomtype);
        return view('livewire.user.room-index', [
            'roomtype' => $roomtype,
        ]);
    }
}
