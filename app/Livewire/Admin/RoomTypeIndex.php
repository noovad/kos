<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use Livewire\Component;
use App\Models\RoomType;

use Illuminate\Support\Facades\DB;
use function Flasher\Noty\Prime\noty;

class RoomTypeIndex extends Component
{

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $roomType = RoomType::find($id);
            Photo::where('room_type_id', $id)->delete();
            $roomType->delete();
        });
        noty()->timeout(1000)->progressBar(false)->warning('Product successfuly deleted.');
    }

    public function render()
    {
        $data = RoomType::all();
        return view('livewire.admin.room-type-index', ['data' => $data]);
    }
}
