<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Transaction;
use App\Models\User;
use DateInterval;
use DatePeriod;
use DateTime;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        Transaction::truncate();
        $start = '2024-01-01';
        $end = date('Y-m-d', strtotime('-1 day'));

        $start = new DateTime('2024-01-01');
        $end = (new DateTime(date('Y-m-d')))->modify('-1 month');
        $interval = new DateInterval('P1M');
        $datePeriod = new DatePeriod($start, $interval, $end);
        $dateArray = [];
        foreach ($datePeriod as $date) {
            $dateArray[] = $date->format('Y-m-d');
        }
        foreach ($dateArray as $date) {
            $room = Room::where('id', $faker->numberBetween(1, 15))->with('roomType')->first();
            for ($i = 1; $i <= 45; $i++) {
                $status = 'Sudah Dibayar';
                $user = User::find(rand(1, 30));
                $this->createData($user, $status, $room, $date);
            }
            for ($i = 1; $i <= 5; $i++) {
                $status = 'Tidak Dibayar';
                $user = User::find(rand(1, 30));
                $this->createData($user, $status, $room, $date);
            }
        }

        for ($i = 1; $i <= 30; $i++) {
            $user = User::find($i);
            $status = $faker->randomElement(['Belum Dibayar', 'Draft', 'Sudah Dibayar']);
            $date = $faker->dateTimeBetween(date('Y-m-01'), date('Y-m-t'))->format('Y-m-d');

            if ($user->room_id) {
                $room = Room::find($user->room_id);
                $this->createData($user, $status, $room, $date);
            }
        }
    }

    public function createData($user, $status, $room, $date): void
    {
        $faker = FakerFactory::create();
        $transaction = [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'amount' => $room->roomType->price,
            'period' => $date,
            'due_date' => generateDueDate($date),
            'room_id' => $room->id,
            'room' => $room->name,
            'status' => $status,
            'description' => 'Pembayaran bulan '.dateNow(),
            'payment_code' => $faker->randomNumber(8),
            'order_id' => $faker->randomNumber(8),
        ];

        Transaction::create($transaction);
    }
}
