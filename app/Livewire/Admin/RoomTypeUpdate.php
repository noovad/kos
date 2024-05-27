<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use Livewire\Component;
use App\Models\RoomType;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\RoomTypeForm;

class RoomTypeUpdate extends Component
{
    use WithFileUploads;
    
    public $selectedPhoto = [];
    public $data;
    public RoomTypeForm $form;

    public function mount($id)
    {
        $this->data = RoomType::find($id);
        $this->form->name = $this->data->name;
        $this->form->description = $this->data->description;
        $this->form->price = $this->data->price;

    }

    public function update()
    {
        DB::transaction(function () {
            $this->data->update($this->form->validate());
            foreach ($this->selectedPhoto as $photo) {
            $photoName = $photo->hashName();
            $photo->storeAs('photos', $photoName, 'public');

            Photo::create([
                'room_type_id' => $this->data->id,
                'url' => $photoName
            ]);
            }
        });

        noty()->timeout(1000)->progressBar(false)->addSuccess('Product successfuly updated.');


        $this->selectedPhoto = [];
    }

    public function deletePhoto($idPhoto)
    {
        $photo = Photo::find($idPhoto);
        $photo->delete();
    }

    public function render()
    {
        $photo = Photo::where('room_type_id', $this->data->id)->get();
        return view('livewire.admin.room-type-update', ['data' => $this->data, 'photoMe' => $photo]);
    }
}
