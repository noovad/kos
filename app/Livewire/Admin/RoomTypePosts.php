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
            noty()->timeout(1000)->progressBar(false)->addSuccess('Tipe kamar berhasil dibuat.');
            redirect(route('admin.room-type'));
        } catch (\Exception $e) {
            noty()->timeout(1000)->progressBar(false)->warning('Tipe kamar gagal dibuat.');
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.room-type-posts');
    }
}
