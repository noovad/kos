<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomTypeForm;
use Livewire\Component;
use App\Models\RoomType;

class RoomTypeUpdate extends Component
{
    public $data;
    public RoomTypeForm $form;

    public function mount($id)
    {
      $this->data = RoomType::find($id);
    }

    public function update($id) {
        dd($this->form);
        $data = RoomType::find($id);
        // Update the room type properties
        $data->name = $this->form->name;
        $data->price = $this->form->price;
        $data->description = $this->form->description;
        $data->save();
    }
    
    public function render()
    {
        return view('livewire.admin.room-type-update', ['data' => $this->data]);
    }
}
