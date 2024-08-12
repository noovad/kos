<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use App\Models\RoomType;
use App\Models\Transaction;

class Dashboard extends Component
{

    public $img = 1;
    public $title = 'Dashboard';
    public function monthlyFinancial()
    {
        $year = date('Y');
        $yearly = Transaction::selectRaw("
        SUM(CASE WHEN status = 'Sudah Dibayar' THEN amount ELSE 0 END) AS total_terbayar")
            ->whereYear('period', '=', $year)
            ->groupByRaw("DATE_FORMAT(period, '%Y-%m')")
            ->get();

        $total_terbayar = [];
        foreach ($yearly as $item) {
            $total_terbayar[] = (int) $item['total_terbayar'];
        }

        return $total_terbayar;
    }

    public function roomType()
    {
        $roomTypes = RoomType::with('rooms.user')->get();

        $data = [];
        foreach ($roomTypes as $roomType) {
            $data['roomTypes'][] = $roomType->name;
            $data['rooms'][] = $roomType->rooms->count();
            $data['users'][] = $roomType->rooms->pluck('user.name')->filter()->count();
        }

        return $data;
    }

    public function room()
    {
        $rooms = Room::with('user')->count();
        $roomsWithUser = Room::whereHas('user')->count();
        $data = [
            $roomsWithUser,
            $rooms-$roomsWithUser,
        ];

        return $data;
    }

    public function transaction()
    {
        $transactions = Transaction::selectRaw("status, COUNT(*) as count")
            ->where('status', '!=', 'draft')
            ->whereMonth('period', '=', date('m'))
            ->groupBy('status')
            ->get();

        $data = [];
        foreach ($transactions as $transaction) {
            $data['status'][] = $transaction->status;
            $data['count'][] = $transaction->count;
        }

        return $data;
    }

    public function render()
    {
        $transaction = $this->transaction();
        $roomType = $this->roomType();
        $room = $this->room();
        $yearly = $this->monthlyFinancial();
        return view('livewire.admin.dashboard', [
            'yearly' => $yearly,
            'roomtype' => $roomType,
            'transaction' => $transaction,
            'room' => $room
        ]);
    }
}
