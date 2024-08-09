<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Database\Seeders\RoomTypeSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ----------------- RoomType Seeder -----------------
        $this->call(RoomTypeSeeder::class);

        // ----------------- Room Seeder -----------------
        $this->call(RoomSeeder::class);

        // ----------------- User Seeder -----------------
       $this->call(UserSeeder::class);

        // ----------------- Transaction Seeder -----------------
        $this->call(TransactionSeeder::class);
    }
}
