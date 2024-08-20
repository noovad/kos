<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

        // ----------------- Message Seeder -----------------
        $this->call(MessageSeeder::class);

        // ----------------- Profile Seeder -----------------
        $this->call(SettingSeeder::class);
    }
}
