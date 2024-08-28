<?php

namespace App\Livewire\Admin;

use App\Models\RoomType;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class TransactionRoom extends Component
{
    public $title = 'Transaksi';

    public function render()
    {
        $roomTypes = RoomType::orderBy('name')->has('rooms')->with('rooms')->get();
        $data = [];

        foreach ($roomTypes as $roomType) {
            $rooms = [];

            foreach ($roomType->rooms as $room) {
                $transaction = Transaction::select('status', 'due_date', 'period')
                    ->where('room_id', $room->id)
                    ->where(function ($query) {
                        $query->where('period', '<=', Carbon::now())
                            ->where('period', '>=', Carbon::now()->subMonth());
                    })
                    ->first();

                $rooms[] = [
                    'room' => $room->name,
                    'user' => $room->user ? $room->user->name : null,
                    'due_date' => $transaction ? $transaction->due_date : null,
                    'status' => $room->user ? 'active' : null,
                    'transaction_status' => $transaction ? $transaction->status : 'Belum Ada Tagihan',
                ];
            }

            $data[] = [
                'room_type' => $roomType->name,
                'rooms' => $rooms,
            ];
        }

        return view('livewire.admin.transaction-room', ['data' => $data]);
    }
}
