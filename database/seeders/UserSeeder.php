<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
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

        // Buat 15 user dengan room_id
        $namesWithRoom = [
            'Bagas',
            'Cipto',
            'Dimas',
            'Erlangga',
            'Farhan',
            'Gunawan',
            'Hafiz',
            'Ilham',
            'Jefri',
            'Kusuma',
            'Lazuardi',
            'Mulyadi',
            'Narendra',
            'Pratama',
            'Rafli',
        ];

        $usersWithRoom = [];
        for ($i = 4; $i <= 18; $i++) { 
            $roomId = ($i - 3); 
            $startDate = $faker->dateTimeBetween('2024-06-01', '2024-06-30')->format('Y-m-d');
            if (in_array($roomId, [9, 10])) { 
                $roomId = null;
                $startDate = null;
            }

            $usersWithRoom[] = [
                'id' => $i,
                'name' => $namesWithRoom[$i - 4], 
                'room_id' => $roomId,
                'role' => 'user',
                'start_date' => $startDate,
                'password' => Hash::make('12312344'),
            ];
        }
        DB::table('users')->insert($usersWithRoom);

        // Buat 20 user tanpa room_id
        $namesWithoutRoom = [
            'Andi',
            'Budi',
            'Cahyo',
            'Dani',
            'Eko',
            'Fajar',
            'Gilang',
            'Hendra',
            'Indra',
            'Joko',
            'Kurniawan',
            'Lutfi',
            'Mahendra',
            'Nugroho',
            'Oka',
            'Pandu',
            'Rizki',
            'Setiawan',
            'Taufik',
            'Wawan',
        ];

        $usersWithoutRoom = [];
        for ($i = 19; $i <= 38; $i++) { // Loop dari 19 hingga 38 (total 20 pengguna)
            $usersWithoutRoom[] = [
                'id' => $i,
                'name' => $namesWithoutRoom[$i - 19], // Menyesuaikan indeks dengan loop
                'room_id' => null,
                'role' => 'user',
                'password' => Hash::make('12312344'),
            ];
        }

        // Masukkan user tanpa room_id ke dalam database
        DB::table('users')->insert($usersWithoutRoom);
    }
}
