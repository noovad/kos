<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menghapus semua data pada tabel messages
        Message::truncate();

        // Menambahkan data baru
        DB::table('messages')->insert([
            // Chats pribadi antara Admin 1 dan User 4
            [
                'sender_id' => 1,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 4,
                'message' => 'Halo, selamat datang di kamar baru Anda. Jika ada pertanyaan, jangan ragu untuk bertanya.',
                'is_group_chat' => false,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],

            //grup

            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Selamat datang di grup chat! Silakan berbagi informasi atau pertanyaan di sini.',
                'is_group_chat' => true,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Terima kasih, semoga kita bisa saling membantu di sini.',
                'is_group_chat' => true,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Jika ada yang butuh bantuan, jangan ragu untuk bertanya.',
                'is_group_chat' => true,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 4,
                'receiver_id' => null,
                'message' => 'Apakah ada jadwal rutin untuk acara bersama?',
                'is_group_chat' => true,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 5,
                'receiver_id' => null,
                'message' => 'Saya juga baru bergabung, senang bisa menjadi bagian dari grup ini.',
                'is_group_chat' => true,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 6,
                'receiver_id' => null,
                'message' => 'Halo semuanya, mari kita jaga komunikasi yang baik di sini.',
                'is_group_chat' => true,
                'is_admin' => false,
                'created_at' => Carbon::now(),
            ],

            //group admin
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Halo semua, saya ingin mengingatkan bahwa batas akhir pembayaran uang kos adalah minggu depan. Tolong pastikan semua penghuni sudah melakukan pembayaran tepat waktu.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(10),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Terima kasih atas pengingatnya. Saya juga ingin menambahkan, kita harus lebih ketat dalam memantau pembayaran bulan ini, mengingat ada beberapa penghuni yang selalu terlambat membayar.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(9),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Benar, kita harus lebih disiplin soal ini. Saya usulkan untuk mengirimkan notifikasi pembayaran sehari sebelum batas akhir, agar mereka tidak lupa.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(8),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Setuju, notifikasi sehari sebelumnya sangat membantu. Selain itu, bagaimana dengan kebersihan minggu ini? Apakah ada masalah yang perlu kita selesaikan?',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(7),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Untuk kebersihan, saya mendapat laporan bahwa beberapa penghuni mengeluh tentang kondisi kamar mandi di lantai dua. Petugas kebersihan sudah diberi tahu, dan mereka akan membersihkannya lebih intensif.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(6),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Bagus, kita juga perlu memastikan bahwa setiap penghuni mengikuti jadwal kebersihan yang sudah disepakati. Saya perhatikan beberapa orang masih belum mematuhi jadwal.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Tepat sekali, saya setuju. Mungkin kita bisa melakukan pengecekan secara berkala untuk memastikan semua penghuni menjalankan tugas kebersihan mereka.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(4),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Itu ide yang bagus. Saya bisa membuat daftar tugas yang lebih jelas dan membagikannya kepada semua penghuni.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Oke, mari kita mulai dengan pembersihan akhir minggu ini. Kita bisa menggunakan kesempatan ini untuk mengingatkan semua penghuni tentang pentingnya kebersihan.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => null,
                'message' => 'Setuju. Mari kita lanjutkan komunikasi ini dengan baik dan pastikan semuanya berjalan lancar. Terima kasih atas kerjasamanya.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->subDay(),
            ],
            [
                'sender_id' => 2,
                'receiver_id' => null,
                'message' => 'Terima kasih kembali. Semoga minggu ini berjalan lancar tanpa ada masalah yang berarti.',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now(),
            ],
            [
                'sender_id' => 3,
                'receiver_id' => null,
                'message' => 'Amin. Semangat semua!',
                'is_group_chat' => false,
                'is_admin' => true,
                'created_at' => Carbon::now()->addDay(),
            ],
        ]);
    }
}
