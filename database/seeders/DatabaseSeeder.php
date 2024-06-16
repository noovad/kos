<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        // ----------------- RoomType Seeder -----------------
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        RoomType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roomTypes = [
            ["id" => 1, "name" => "Tipe 1", "price" => 1100000, "description" => "Deskripsi untuk Tipe 1"],
            ["id" => 2, "name" => "Tipe 2", "price" => 1200000, "description" => "Deskripsi untuk Tipe 2"],
            ["id" => 3, "name" => "Tipe 3", "price" => 1300000, "description" => "Deskripsi untuk Tipe 3"],
            ["id" => 4, "name" => "Tipe 4", "price" => 1400000, "description" => "Deskripsi untuk Tipe 4"],
            ["id" => 5, "name" => "Tipe 5", "price" => 1500000, "description" => "Deskripsi untuk Tipe 5"],
            ["id" => 6, "name" => "Tipe 6", "price" => 1600000, "description" => "Deskripsi untuk Tipe 6"]
        ];

        foreach ($roomTypes as $roomType) {
            RoomType::create($roomType);
        }

        // ----------------- Room Seeder -----------------
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Room::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $rooms = [];
        $roomTypeId = 1;
        for ($i = 1; $i <= 60; $i++) {
            $room = [
                "id" => $i,
                "name" => "Kamar " . sprintf("%02d", $i),
                "room_type_id" => $roomTypeId
            ];
            $rooms[] = $room;
            if ($i % 10 == 0) {
                $roomTypeId++;
            }
        }

        foreach ($rooms as $room) {
            Room::create($room);
        }

        // ----------------- User Seeder -----------------
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        for ($i = 1; $i <= 30; $i++) {
            // Generate random value for room_id, which can be null or a random room id between 1 and 60
            $randomValue = mt_rand(0, 1) ? rand(1, 60) : null;

            $user = [
                'id' => $i,
                'name' => $faker->name,
                'room_id' => $randomValue,
                'email' => $faker->unique()->safeEmail,
                'phone' => '+62' . $faker->randomNumber(9, true),
                'password' => Hash::make('12312344'),
            ];

            $start = '2024-01-01';
            $end = '2024-' . date('m', strtotime('-1 month')) . '-31';
            $randomDate = $faker->dateTimeBetween($start, $end);
            if ($user['room_id']) {
                $user['start_date'] = $randomDate;
            }

            User::create($user);
        }

        // ----------------- Transaction Seeder -----------------
        Transaction::truncate();
        $start = '2024-01-01';
        $end = date('Y-m-d', strtotime('-1 day'));
        
        for ($i = 1; $i <= 150; $i++) {
            $user = User::find(rand(1, 30));
            $room = Room::where('id', $faker->numberBetween(1, 60))->with('roomType')->first();

            $transaction = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'amount' => $room->roomType->price,
                'due_date' => $faker->dateTimeBetween($start, $end),
                'room_id' => $room->id,
                'room' => $room->name,
                'status' => "Sudah Dibayar",
                'description' => 'Pembayaran bulan ' . dateNow(),
                'payment_code' => $faker->randomNumber(8),
                'order_id' => $faker->randomNumber(8)
            ];

            Transaction::create($transaction);
        }

        for ($i = 1; $i <= 30; $i++) {
            $user = User::find($i);
            if ($user->room_id) {
                $room = Room::find($user->room_id);
                $transaction = [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'amount' => $room->roomType->price,
                    'due_date' => generateDueDate($user->start_date),
                    'room_id' => $room->id,
                    'room' => $room->name,
                    'status' => $faker->randomElement(['Belum Dibayar', 'Sudah Dibayar']),
                    'description' => 'Pembayaran bulan ' . dateNow(),
                    'payment_code' => $faker->randomNumber(8),
                    'order_id' => $faker->randomNumber(8)
                ];

                Transaction::create($transaction);
            }
        }
    }
}
