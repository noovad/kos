<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\Photo;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class RoomTypePosts extends Component
{
    use WithFileUploads;

    public array $photo = [];

    public RoomTypeForm $form;

    public function store(): void
    {
        DB::transaction(function () {
            $roomType = RoomType::create($this->form->validate());

            foreach ($this->photo as $photo) {
                $photoName = $photo->hashName();
                $photo->storeAs('photos', $photoName, 'public');

                Photo::create([
                    'room_type_id' => $roomType->id,
                    'url' => $photoName,
                ]);
            }
        });

        noty()->timeout(1000)->progressBar(false)->addSuccess('Product successfuly created.');

        $this->form->reset();
        redirect(route('admin.room-type'));
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.room-type-posts');
    }
}
