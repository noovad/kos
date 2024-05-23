<?php

namespace App\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

use function Flasher\Noty\Prime\noty;

class RoomTypeIndex extends Component
{

    public function destroy($id)
    {
        $roomType = RoomType::find($id);
        $roomType->delete();
        noty()->timeout(1000)->progressBar(false)->warning('Product successfuly deleted.');
    }

    public function render()
    {
        $data = RoomType::all();
        return view('livewire.admin.room-type-index', ['data' => $data]);
    }
}
