<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Room::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $rooms = [];
        $roomTypeId = 1;
        for ($i = 1; $i <= 30; $i++) {
            $room = [
                'id' => $i,
                'name' => 'Kamar ' . sprintf('%02d', $i),
                'room_type_id' => $roomTypeId,
            ];
            $rooms[] = $room;
            if ($i % 10 == 0) {
                $roomTypeId++;
            }
        }

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
