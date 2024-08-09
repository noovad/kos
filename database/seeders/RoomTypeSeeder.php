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
            ['id' => 1, 'name' => 'Tipe 1', 'price' => 1100000, 'description' => 'Deskripsi untuk Tipe 1'],
            ['id' => 2, 'name' => 'Tipe 2', 'price' => 1200000, 'description' => 'Deskripsi untuk Tipe 2'],
            ['id' => 3, 'name' => 'Tipe 3', 'price' => 1300000, 'description' => 'Deskripsi untuk Tipe 3'],
            ['id' => 4, 'name' => 'Tipe 4', 'price' => 1400000, 'description' => 'Deskripsi untuk Tipe 4'],
            ['id' => 5, 'name' => 'Tipe 5', 'price' => 1500000, 'description' => 'Deskripsi untuk Tipe 5'],
            ['id' => 6, 'name' => 'Tipe 6', 'price' => 1600000, 'description' => 'Deskripsi untuk Tipe 6'],
        ];

        foreach ($roomTypes as $roomType) {
            RoomType::create($roomType);
        }
    }
}
