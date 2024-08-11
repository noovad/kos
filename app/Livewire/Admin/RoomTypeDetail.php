<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use App\Models\RoomType;
use Livewire\Component;

class RoomTypeDetail extends Component
{
    public $title = 'Tipe Kamar';

    public RoomType $data;

    public object $photo;

    public function mount(string $id): void
    {
        $this->data = RoomType::find($id);
        $this->data->price = number_format($this->data->price, 0, ',', '.');
        $this->photo = Photo::where('room_type_id', $id)->get();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.room-type-detail', ['data' => $this->data]);
    }
}
