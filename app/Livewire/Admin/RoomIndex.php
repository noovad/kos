<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RoomForm;
use App\Models\Room;
use App\Models\RoomType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RoomIndex extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $filter = '';

    public $empty = '';

    public RoomForm $form;

    public function update($id)
    {
        $this->dispatch('update-room', id: $id);
    }

    public function delete($roomId)
    {
        try {
            Room::find($roomId)->delete();
            noty()->timeout(1000)->progressBar(false)->addSuccess('Data berhasil dihapus.');
            $this->dispatch('close-modal-delete');
        } catch (\Throwable $th) {
            noty()->timeout(1000)->progressBar(false)->addError('Data gagal dihapus.');
        }
    }

    #[On('room-created')]
    #[On('room-updated')]
    public function render()
    {
        $data = Room::orderBy('name')->with('roomType')->with('user');

        if ($this->filter) {
            $data->where('room_type_id', $this->filter);
        }

        if ($this->empty == 1) {
            $data->has('user');
        } elseif ($this->empty == 0) {
            $data->doesntHave('user');
        }

        $data = $data->paginate(10);

        $tipe = RoomType::orderBy('name')->get();

        return view('livewire.admin.room-index', ['data' => $data, 'tipe' => $tipe]);
    }
}
