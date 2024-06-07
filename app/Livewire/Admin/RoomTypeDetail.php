<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use App\Models\RoomType;
use Livewire\Component;

class RoomTypeDetail extends Component
{
    public object $data;

    public object $photo;

    public function mount(string $id): void
    {
        $this->data = RoomType::find($id);
        $this->photo = Photo::where('room_type_id', $id)->get();
    }

    public function render(): \Illuminate\View\View
    {
        // dd($this->photo);
        return view('livewire.admin.room-type-detail', ['data' => $this->data]);
    }
}
