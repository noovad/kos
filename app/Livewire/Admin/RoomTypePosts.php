<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use Livewire\Component;
use App\Models\RoomType;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\RoomTypeForm;

class RoomTypePosts extends Component
{
    use WithFileUploads;

    public $title = 'Tipe Kamar';

    public array $photo = [];

    public $formattedValue = '';

    public RoomTypeForm $form;

    public function store(): void
    {
        $this->form->price = (int) str_replace('.', '', $this->formattedValue);
        $validate = $this->form->validate();
        try {
            DB::transaction(function () use ($validate) {
                $roomType = RoomType::create($validate);
                foreach ($this->photo as $photo) {
                    $photoName = $photo->hashName();
                    $photo->storeAs('photos', $photoName, 'public');
                    Photo::create([
                        'room_type_id' => $roomType->id,
                        'url' => $photoName,
                    ]);
                }
            });
            redirect(route('admin.room-type-index'));
            noty()->timeout(1000)->progressBar(false)->addSuccess('Tipe kamar berhasil dibuat.');
        } catch (\Exception $e) {
            noty()->timeout(1000)->progressBar(false)->warning('Tipe kamar gagal dibuat.');
        }
    }

    public function render()
    {
        return view('livewire.admin.room-type-posts');
    }
}
