<?php

namespace App\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Attributes\Url;
use Livewire\Component;

class RoomTypeDetail extends Component
{
    public $data;

    public function mount($id)
    {
      $this->data = RoomType::find($id);
    }
  
    public function render()
    {
        return view('livewire.admin.room-type-detail', ['data' => $this->data]);
    }
}
