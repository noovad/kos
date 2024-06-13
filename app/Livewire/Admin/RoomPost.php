<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomForm;
use App\Models\Room;
use App\Models\RoomType;
use Livewire\Attributes\On;
use Livewire\Component;

class RoomPost extends Component
{
    public RoomForm $form;

    public Room $room;

    public $update_data = false;

    public function create()
    {
        $validate = ($this->form->validate());

        try {
            Room::create($validate);
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
            $this->dispatch('room-created');
            $this->dispatch('close-modal-create');
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
        $this->form->reset();
    }

    #[On('update-room')]
    public function openUpdate($id)
    {
        $this->room = Room::where('id', $id)->with('roomType')->firstOrFail();
        $this->form->name = $this->room->name ?? '';
        $this->form->room_type_id = $this->room->roomType->id ?? '';
        $this->update_data = true;
        $this->dispatch('open-modal-create');
    }

    public function update()
    {
        $validate = ($this->form->validate());
        try {
            $this->room->update($validate);

            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');
            $this->dispatch('close-modal-create');
            $this->dispatch('room-updated');

            $this->update_data = false;

        } catch (\Throwable $th) {

            noty()->timeout(1000)->progressBar(false)->addError('Data gagal diperbarui.');
        }
        $this->form->reset();
    }

    public function closeModal()
    {
        $this->update_data = false;
        $this->dispatch('close-modal-create');

        $this->form->reset();

    }

    public function render()
    {
        $tipe = RoomType::orderBy('name')->get();

        return view('livewire.admin.room-post', ['tipe' => $tipe]);
    }
}
