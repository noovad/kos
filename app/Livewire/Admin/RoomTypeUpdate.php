<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\Photo;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class RoomTypeUpdate extends Component
{
    use WithFileUploads;

    public $title = 'Tipe Kamar';

    public array $selectedPhoto = [];

    public string $formattedValue = '';

    public object $data;

    public RoomTypeForm $form;

    public function mount(string $id): void
    {
        $this->data = RoomType::find($id);
        $this->formattedValue = number_format($this->data->price, 0, ',', '.');
        $this->form->name = $this->data->name;
        $this->form->description = $this->data->description;
        $this->form->price = $this->data->price;
    }

    public function update(): void
    {
        $this->form->price = (int) str_replace('.', '', $this->formattedValue);
        $validate = $this->form->validate();
        try {
            DB::transaction(function () use ($validate) {
                $this->data->update($validate);
                foreach ($this->selectedPhoto as $photo) {
                    $photoName = $photo->hashName();
                    $photo->storeAs('photos', $photoName, 'public');

                    Photo::create([
                        'room_type_id' => $this->data->id,
                        'url' => $photoName,
                    ]);
                }
            });

            $this->reset(['selectedPhoto']);
            redirect(route('admin.room-type-index'));
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');
        } catch (\Exception $e) {
            noty()->timeout(1000)->progressBar(false)->warning('Data gagal diperbarui.');
        }
    }

    public function deletePhoto(string $idPhoto): void
    {
        try {
            $photo = Photo::find($idPhoto);
            $photo->delete();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Foto berhasil dihapus.');
        } catch (\Exception $e) {
            noty()->timeout(1000)->progressBar(false)->warning('Gagal menghapus foto.');
        }
    }

    public function render(): \Illuminate\View\View
    {
        $photo = Photo::where('room_type_id', $this->data->id)->get();

        return view('livewire.admin.room-type-update', ['data' => $this->data, 'photoMe' => $photo]);
    }
}
