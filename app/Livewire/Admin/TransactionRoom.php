<?php

namespace App\Livewire\Admin;

use App\Models\RoomType;
use Livewire\Component;

class TransactionRoom extends Component
{
    public function render()
    {
        $data = RoomType::orderBy('name')->with('rooms.user.transaction')->get();

        // dd($data);
        return view('livewire.admin.transaction-room', ['data' => $data]);
    }
}
