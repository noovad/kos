<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

use function Flasher\Noty\Prime\noty;

class RoomTypeIndex extends Component
{
    use WithoutUrlPagination, WithPagination;

    public function destroy(string $id): void
    {
        try {
            DB::transaction(function () use ($id) {
                $roomType = RoomType::find($id);
                Photo::where('room_type_id', $id)->delete();
                $roomType->delete();
            });
            noty()->timeout(1000)->progressBar(false)->warning('Data berhasil dihapus.');
        } catch (\Exception $e) {
            $errorCode = $e->getCode();

            if ($errorCode == 23000) {
                noty()->timeout(1000)->progressBar(false)->error('Tidak dapat menghapus data karena ada data terkait.');
            } else {
                noty()->timeout(1000)->progressBar(false)->error('Terjadi kesalahan saat menghapus data.');
            }
        }
    }

    public function render(): \Illuminate\View\View
    {
        $data = RoomType::orderBy('name')->paginate(20);

        return view('livewire.admin.room-type-index', ['data' => $data]);
    }
}
