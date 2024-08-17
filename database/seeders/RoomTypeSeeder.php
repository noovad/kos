<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ----------------- RoomType Seeder -----------------
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RoomType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roomTypes = [
            ['id' => 1, 'name' => 'Tipe A', 'price' => 1250000, 'description' => 'Deskripsi untuk Tipe 1'],
            ['id' => 2, 'name' => 'Tipe B', 'price' => 100000, 'description' => 'Deskripsi untuk Tipe 2'],
            ['id' => 3, 'name' => 'Tipe C ', 'price' => 750000, 'description' => 'Deskripsi untuk Tipe 3'],
        ];

        foreach ($roomTypes as $roomType) {
            RoomType::create($roomType);
        }
    }
}
