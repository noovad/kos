<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('rooms')->insert([
            // Kamar 1-7 tipe room 1
            [
                'id' => 1,
                'name' => 'Kamar 01',
                'room_type_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Kamar 02',
                'room_type_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Kamar 03',
                'room_type_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Kamar 04',
                'room_type_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Kamar 05',
                'room_type_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Kamar 06',
                'room_type_id' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Kamar 07',
                'room_type_id' => 1,
            ],
            // Kamar 8-13 tipe room 2
            [
                'id' => 8,
                'name' => 'Kamar 08',
                'room_type_id' => 2,
            ],
            [
                'id' => 9,
                'name' => 'Kamar 09',
                'room_type_id' => 2,
            ],
            [
                'id' => 10,
                'name' => 'Kamar 10',
                'room_type_id' => 2,
            ],
            [
                'id' => 11,
                'name' => 'Kamar 11',
                'room_type_id' => 2,
            ],
            [
                'id' => 12,
                'name' => 'Kamar 12',
                'room_type_id' => 2,
            ],
            [
                'id' => 13,
                'name' => 'Kamar 13',
                'room_type_id' => 2,
            ],
            // Kamar 14-20 tipe room 3
            [
                'id' => 14,
                'name' => 'Kamar 14',
                'room_type_id' => 3,
            ],
            [
                'id' => 15,
                'name' => 'Kamar 15',
                'room_type_id' => 3,
            ],
            [
                'id' => 16,
                'name' => 'Kamar 16',
                'room_type_id' => 3,
            ],
            [
                'id' => 17,
                'name' => 'Kamar 17',
                'room_type_id' => 3,
            ],
            [
                'id' => 18,
                'name' => 'Kamar 18',
                'room_type_id' => 3,
            ],
            [
                'id' => 19,
                'name' => 'Kamar 19',
                'room_type_id' => 3,
            ],
            [
                'id' => 20,
                'name' => 'Kamar 20',
                'room_type_id' => 3,
            ],
        ]);
    }
}
