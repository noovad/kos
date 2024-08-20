<?php

namespace App\Livewire\User;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class RoomDetail extends Component
{
    public $title = 'Detail Kamar';

    public $roomTypeId;

    public function mount($roomType)
    {
        $roomType = str_replace('_', ' ', $roomType);
        $this->roomTypeId = RoomType::where('name', $roomType)->first()->id;
    }

    public function room()
    {
        $room = Room::where('room_type_id', $this->roomTypeId)->with('user')->get();

        return $room;
    }

    public function roomType()
    {
        $roomType = RoomType::with('photos')->find($this->roomTypeId);

        return $roomType;
    }

    public function render()
    {
        $room = $this->room();
        $roomType = $this->roomType();

        // dd($roomType);
        return view('livewire.user.room-detail', [
            'room' => $room,
            'roomType' => $roomType,
        ]);
    }
}
