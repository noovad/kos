<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use App\Models\RoomType;
use Livewire\Attributes\Url;
use Livewire\Component;

class RoomTypeDetail extends Component
{
    public $data;
    public $photo;

    public function mount($id)
    {
      $this->data = RoomType::find($id);
      $this->photo= Photo::where('room_type_id', $id)->get();
    }
  
    public function render()
    {
      // dd($this->photo);
        return view('livewire.admin.room-type-detail', ['data' => $this->data]);
    }
}
