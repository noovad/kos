<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Transaction;
use Livewire\Component;

class Dashboard extends Component
{
    public $img = 1;

    public $title = 'Dashboard';

    public function monthlyFinancial()
    {
        $year = date('Y');

        $total_terbayar = array_fill(0, 12, 0);

        $yearly = Transaction::selectRaw("
            MONTH(period) as month,
            SUM(CASE WHEN status = 'Sudah Dibayar' THEN amount ELSE 0 END) AS total_terbayar")
            ->whereYear('period', '=', $year)
            ->groupByRaw("MONTH(period)")
            ->get();

        foreach ($yearly as $item) {
            $month = $item->month - 1;
            $total_terbayar[$month] = (int) $item->total_terbayar;
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
            $rooms - $roomsWithUser,
        ];

        return $data;
    }

    public function transaction()
    {
        $transactions = Transaction::selectRaw('status, COUNT(*) as count')
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

        $percentage = Transaction::selectRaw("
        ROUND((SUM(CASE WHEN status = 'Sudah Dibayar' THEN 1 ELSE 0 END) / COUNT(*)) * 100) AS persentase_pembayaran")
            ->where('status', '!=', 'draft')
            ->whereYear('period', '=', date('Y'))
            ->whereMonth('period', '=', date('m'))->get();

        $income = Transaction::where('status', 'Sudah Dibayar')
            ->whereMonth('period', '=', date('m'))
            ->sum('amount');

        return view('livewire.admin.dashboard', [
            'yearly' => $yearly,
            'roomtype' => $roomType,
            'transaction' => $transaction,
            'room' => $room,
            'percentage' => $percentage[0]['persentase_pembayaran'],
            'income' => $income / 1000000,
        ]);
    }
}
