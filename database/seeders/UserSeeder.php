<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        // Nonaktifkan pemeriksaan foreign key dan hapus data pada tabel users
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Buat 3 user dengan role admin
        $users = [
            [
                'id' => 1,
                'name' => 'admin1',
                'role' => 'admin',
                'password' => Hash::make('12312344'),
            ],
            [
                'id' => 2,
                'name' => 'admin2',
                'role' => 'admin',
                'password' => Hash::make('12312344'),
            ],
            [
                'id' => 3,
                'name' => 'admin3',
                'role' => 'admin',
                'password' => Hash::make('12312344'),
            ],
        ];

        // Masukkan user admin ke dalam database
        DB::table('users')->insert($users);

        // Buat 20 user tanpa room_id
        $name = [
            'Andi', 'Budi', 'Cahyo', 'Dani', 'Eko', 'Fajar', 'Gilang', 'Hendra', 'Indra', 'Joko',
            'Kurniawan', 'Lutfi', 'Mahendra', 'Nugroho', 'Oka', 'Pandu', 'Rizki', 'Setiawan', 'Taufik', 'Wawan'
        ];

        $usersWithoutRoom = [];
        for ($i = 4; $i <= 23; $i++) {
            $usersWithoutRoom[] = [
                'id' => $i,
                'name' => $name[$i - 4],
                'room_id' => null,
                'role' => 'user',
                'password' => Hash::make('12312344'),
            ];
        }

        // Masukkan user tanpa room_id ke dalam database
        DB::table('users')->insert($usersWithoutRoom);


        // Buat 15 user dengan room_id
        $name = [
            'Bagas', 'Cipto', 'Dimas', 'Erlangga', 'Farhan', 'Gunawan', 'Hafiz', 'Ilham', 'Jefri', 'Kusuma',
            'Lazuardi', 'Mulyadi', 'Narendra', 'Pratama', 'Rafli'
        ];
        $usersWithRoom = [];
        for ($i = 24; $i <= 38; $i++) {
            $roomId = ($i - 23);
            if (in_array($roomId, [9, 10])) {
                $roomId = null;
            }
            $usersWithRoom[] = [
                'id' => $i,
                'name' => $name[$i - 24],
                'room_id' => $roomId, 
                'role' => 'user',
                'password' => Hash::make('12312344'),
            ];
        }

        // Masukkan user dengan room_id ke dalam database
        DB::table('users')->insert($usersWithRoom);
    }
}
