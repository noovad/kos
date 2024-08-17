<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Message::Truncate();
        DB::table('messages')->insert([

            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'Please note that there will be a slight increase in the room rental starting next month.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'How much will the increase be?',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(9),
                'updated_at' => Carbon::now()->subDays(9),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'It will be an additional $50 per month.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(8),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'Understood, thank you for informing me in advance.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'Your room rental payment is due by the end of this month.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'I will make the payment by this weekend. Thank you for the reminder.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(6),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'You’re welcome. Please make sure to keep the payment slip.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'There seems to be an issue with the water heater in my room.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'I will send someone to check it tomorrow morning.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'Thank you for the quick response!',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'I have made the payment for the room rental today.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'Thank you for your payment. Your room rental has been updated.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'message' => 'Great! Can I get a receipt for the payment?',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'Sure, I will send you the receipt by tomorrow.',
                'is_group_chat' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Conversation between user_id 1 and user_id 3
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'message' => 'Hello, welcome to your new room. If you have any questions, feel free to ask.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 1,
                'message' => 'Thank you! Could you please tell me the Wi-Fi password?',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'message' => 'Sure, the Wi-Fi password is "RoomRental2024".',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 1,
                'message' => 'Got it, thanks!',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 3,
                'message' => 'Reminder: Please submit your room rental payment by the end of the week.',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(8),
                'updated_at' => Carbon::now()->subDays(8),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 1,
                'message' => 'Sure, I’ll do it tomorrow. Thanks for the reminder!',
                'is_group_chat' => false,
                'created_at' => Carbon::now()->subDays(7),
                'updated_at' => Carbon::now()->subDays(7),
            ],

            // Group chat
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Welcome everyone to the group chat! Feel free to share any updates here.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(6),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Thanks for the welcome! Looking forward to collaborating with everyone.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Hello all! Please let me know if there are any tasks assigned to me.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'Hi everyone, I’m here. Can anyone provide a brief overview of what’s happening?',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'We’re discussing the upcoming project deadlines and any issues that might have come up.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'I have a report ready that I’ll share with everyone shortly.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Sounds good. I’ll review it once you share it.',
                'is_group_chat' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'I’ll also go through the report. Let’s ensure we’re all on the same page.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Great, thanks! Let’s aim to finalize everything by the end of this week.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(2),
                'updated_at' => Carbon::now()->addDays(2),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Agreed. If anyone needs help, just let me know.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(3),
                'updated_at' => Carbon::now()->addDays(3),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'I might need some assistance with the client presentation slides. Anyone free?',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(4),
                'updated_at' => Carbon::now()->addDays(4),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'I can help with that. Let’s coordinate after this meeting.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(5),
                'updated_at' => Carbon::now()->addDays(5),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Perfect. Thanks for stepping in!',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(6),
                'updated_at' => Carbon::now()->addDays(6),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'No problem! Let’s ensure everything is ready for the presentation.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(7),
                'updated_at' => Carbon::now()->addDays(7),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Absolutely. I’ll start working on the visuals right away.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(8),
                'updated_at' => Carbon::now()->addDays(8),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'Let’s meet briefly tomorrow to review the progress.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(9),
                'updated_at' => Carbon::now()->addDays(9),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Good idea. Let’s aim for 10 AM?',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(10),
                'updated_at' => Carbon::now()->addDays(10),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => '10 AM works for me. See you all then!',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(11),
                'updated_at' => Carbon::now()->addDays(11),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Count me in. Looking forward to it.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(12),
                'updated_at' => Carbon::now()->addDays(12),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'Same here. Let’s make it a productive meeting.',
                'is_group_chat' => true,
                'created_at' => Carbon::now()->addDays(13),
                'updated_at' => Carbon::now()->addDays(13),
            ],

        ]);
    }
}
