<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['id' => 1, 'name' => 'Tipe A', 'price' => 1250000, 'description' => '<div>Kamar kos ini dirancang untuk kenyamanan maksimal dengan fasilitas premium. Cocok untuk kamu yang mencari hunian eksklusif dengan layanan tambahan seperti laundry dan cleaning service. Lingkungan yang asri dan aman menjadikan tempat ini pilihan ideal.<br><br></div><div><strong>Fasilitas:</strong></div><ul><li>Ukuran Kamar: 5x5 meter</li><li>Kamar Mandi Dalam dengan Air Panas</li><li>AC, Smart TV, dan Wi-Fi</li><li>Kasur King Size, Lemari Besar, dan Meja Kerja</li><li>Laundry dan Cleaning Service</li></ul><div><br></div><div>Harga sewa kamar ini adalah Rp 1.25.000,- per bulan.</div>'],
            ['id' => 2, 'name' => 'Tipe B', 'price' => 1000000, 'description' => '<div>Nikmati suasana tenang di kamar kos yang nyaman ini. Kamar ini dilengkapi dengan balkon pribadi yang bisa digunakan untuk bersantai atau menjemur pakaian. Lokasinya strategis dekat dengan pusat perbelanjaan dan transportasi umum.<br><br></div><div><strong>Fasilitas:</strong></div><ul><li>Ukuran Kamar: 4x4 meter</li><li>Kamar Mandi Luar</li><li>Balkon Pribadi dengan Pemandangan Kota</li><li>Kasur Queen Size dan Lemari Pakaian</li><li>Wi-Fi dan Akses Parkir</li></ul><div>Harga sewa kamar ini adalah Rp 1.000.000,- per bulan.</div>'],
            ['id' => 3, 'name' => 'Tipe C', 'price' => 750000, 'description' => '<div>Kamar kos ini menawarkan ruang yang nyaman dan minimalis dengan fasilitas lengkap yang cocok untuk mahasiswa atau pekerja. Tersedia kasur single, lemari pakaian, meja belajar, dan kursi yang didesain ergonomis.<br><br></div><div><strong>Fasilitas:</strong></div><ul><li>Ukuran Kamar: 3x4 meter</li><li>Kamar Mandi Dalam</li><li>AC dan Wi-Fi Gratis</li><li>Meja Belajar dan Lemari Pakaian</li><li>Akses 24 Jam dan Keamanan CCTV</li></ul><div><br></div><div>Harga sewa kamar ini adalah Rp 700.000,- per bulan.</div>'],
        ];

        foreach ($roomTypes as $roomType) {
            RoomType::create($roomType);
        }
    }
}
