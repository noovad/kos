<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user = [
            'id' => 1,
            'name' => 'admin',
            'email' => $faker->unique()->safeEmail,
            'role' => 'admin',
            'phone' => '+62' . $faker->randomNumber(5, true) . $faker->randomNumber(6, true),
            'password' => Hash::make('12312344'),
        ];
        User::create($user);


        $user = [
            'id' => 2,
            'name' => 'Floyd',
            'email' => $faker->unique()->safeEmail,
            'role' => 'user',
            'phone' => '+62' . $faker->randomNumber(5, true) . $faker->randomNumber(6, true),
            'password' => Hash::make('12312344'),
        ];
        User::create($user);

        for ($i = 3; $i <= 100; $i++) {
            // Generate random value for room_id, which can be null or a random room id between 1 and 60
            $randomValue = mt_rand(0, 1) ? rand(1, 30) : null;

            $user = [
                'id' => $i,
                'name' => $faker->name,
                'room_id' => $randomValue,
                'email' => $faker->unique()->safeEmail,
                'role' => 'user',
                'phone' => '+62' . $faker->randomNumber(5, true) . $faker->randomNumber(6, true),
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
    }
}
