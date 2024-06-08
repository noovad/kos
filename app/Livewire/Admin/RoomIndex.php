<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomForm;
use Livewire\Component;
use App\Models\Room;
use App\Models\RoomType;

class RoomIndex extends Component
{
    public $rooms;

    public RoomForm $form;

    public $detail;


    public function create()
    {
        try {
            Room::create($this->form->validate());
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dibuat.');
            $this->dispatch('close-modal');
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dibuat.');
        }
    }


    public function update($roomId)
    {
        $room = Room::find($roomId);
        $room->update($this->form->validate());

        noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil diperbarui.');
    }


    public function openDelete()
    {
        $this->dispatch('open-modal-delete');
    }

    public function delete($roomId)
    {
        $room = Room::find($roomId);
        $room->delete();
        noty()->timeout(1000)->progressBar(false)->warning('Data berhasil dihapus.');

        $this->dispatch('close-modal-delete');

    }

    public function detail($roomId)
    {
        $this->detail = Room::find($roomId);
        $this->dispatch('open-modal-detail');
    }

    public function render()
    {
        $data = Room::orderByDesc('created_at')->with('roomType')->get();
        $tipe = RoomType::orderByDesc('created_at')->get();

        return view('livewire.admin.room-index', ['data' => $data, 'tipe' => $tipe]);
    }
}
