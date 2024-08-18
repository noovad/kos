<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::truncate();
        DB::table('settings')->insert([
            [
                'name' => 'facility',
                'value' => " <p>
        Kos Kami berkomitmen untuk menyediakan fasilitas terbaik yang dirancang untuk menunjang kenyamanan dan kebutuhan Anda selama tinggal di sini. Kami memahami bahwa setiap penghuni memiliki kebutuhan yang berbeda, oleh karena itu kami menawarkan berbagai tipe kamar dengan fasilitas yang disesuaikan. Di bawah ini, Anda akan menemukan penjelasan mengenai fasilitas yang tersedia di kos kami, baik untuk fasilitas umum yang bisa dinikmati oleh semua penghuni, maupun fasilitas khusus yang tergantung pada tipe kamar yang Anda pilih.
    </p>

    <h2>1. Fasilitas Umum</h2>
    <p>
        Fasilitas umum kami dapat diakses oleh semua penghuni, tanpa memandang tipe kamar yang dipilih. Berikut adalah beberapa fasilitas umum yang kami sediakan:
    </p>
    <ul>
        <li><strong>Dapur Bersama:</strong> Kami menyediakan dapur bersama yang lengkap dengan peralatan memasak seperti kompor, microwave, dan kulkas. Anda bebas menggunakan dapur ini untuk menyiapkan makanan kapan pun Anda inginkan.</li>
        <li><strong>Ruang Tamu:</strong> Ruang tamu yang nyaman dilengkapi dengan sofa dan TV kabel, menjadi tempat yang sempurna untuk bersantai atau menerima tamu. Ruang ini tersedia untuk semua penghuni dan tamu mereka.</li>
        <li><strong>Wi-Fi Berkecepatan Tinggi:</strong> Kami menyediakan akses internet berkecepatan tinggi yang dapat diakses dari seluruh area kos, baik di kamar pribadi maupun di area umum.</li>
        <li><strong>Keamanan 24 Jam:</strong> Kos Kami dilengkapi dengan sistem keamanan 24 jam termasuk CCTV dan petugas keamanan yang siap menjaga ketenangan dan keamanan Anda.</li>
        <li><strong>Laundry:</strong> Fasilitas laundry mandiri tersedia untuk semua penghuni. Kami menyediakan mesin cuci dan pengering yang dapat digunakan kapan saja.</li>
        <li><strong>Area Parkir:</strong> Bagi Anda yang memiliki kendaraan pribadi, kami menyediakan area parkir yang aman dan cukup luas untuk sepeda motor dan mobil.</li>
    </ul>

    <h2>2. Fasilitas Berdasarkan Tipe Kamar</h2>
    <p>
        Selain fasilitas umum, kami juga menawarkan fasilitas khusus yang tergantung pada tipe kamar yang Anda pilih. Berikut adalah beberapa tipe kamar yang tersedia di Kos Kami, beserta fasilitas yang menyertainya:
    </p>
    <h3>Tipe Kamar Standar</h3>
    <ul>
        <li><strong>Tempat Tidur Single:</strong> Kamar ini dilengkapi dengan tempat tidur single yang nyaman, cocok untuk penghuni yang tinggal sendiri.</li>
        <li><strong>Meja Belajar:</strong> Setiap kamar standar dilengkapi dengan meja belajar yang cukup luas, dilengkapi dengan kursi ergonomis untuk kenyamanan belajar atau bekerja.</li>
        <li><strong>Lemari Pakaian:</strong> Kamar standar memiliki lemari pakaian yang cukup besar untuk menyimpan pakaian dan barang-barang pribadi Anda.</li>
        <li><strong>Kipas Angin:</strong> Kamar ini dilengkapi dengan kipas angin untuk menjaga sirkulasi udara tetap segar.</li>
    </ul>

    <h3>Tipe Kamar Deluxe</h3>
    <ul>
        <li><strong>Tempat Tidur Queen:</strong> Tipe kamar ini dilengkapi dengan tempat tidur queen yang lebih luas, ideal untuk penghuni yang menginginkan lebih banyak ruang tidur.</li>
        <li><strong>AC:</strong> Kamar deluxe dilengkapi dengan pendingin ruangan (AC) yang bisa Anda atur sesuai kebutuhan, memastikan kenyamanan maksimal sepanjang hari.</li>
        <li><strong>Meja Kerja:</strong> Selain meja belajar, kamar deluxe juga dilengkapi dengan meja kerja yang lebih besar, cocok untuk penghuni yang membutuhkan ruang kerja tambahan.</li>
        <li><strong>Kamar Mandi Dalam:</strong> Fasilitas ini mencakup kamar mandi pribadi di dalam kamar dengan shower air panas.</li>
        <li><strong>Lemari Pakaian Besar:</strong> Kamar deluxe dilengkapi dengan lemari pakaian yang lebih besar, memungkinkan penyimpanan yang lebih banyak dan terorganisir.</li>
    </ul>

    <h3>Tipe Kamar Premium</h3>
    <ul>
        <li><strong>Tempat Tidur King:</strong> Kamar premium menawarkan tempat tidur king yang sangat luas, ideal untuk kenyamanan tidur yang maksimal.</li>
        <li><strong>AC Premium:</strong> Kamar ini dilengkapi dengan AC berkualitas tinggi yang dapat mengatur suhu ruangan secara otomatis.</li>
        <li><strong>Smart TV:</strong> Tipe kamar premium dilengkapi dengan Smart TV yang terhubung dengan layanan streaming, memberikan hiburan tanpa batas di dalam kamar Anda.</li>
        <li><strong>Kamar Mandi Dalam dengan Bathtub:</strong> Nikmati kenyamanan mandi di bathtub yang tersedia di kamar mandi dalam kamar premium, lengkap dengan fasilitas air panas.</li>
        <li><strong>Lemari Pakaian Walk-in:</strong> Kamar premium dilengkapi dengan lemari pakaian walk-in yang sangat luas, menawarkan ruang penyimpanan ekstra untuk pakaian dan aksesori Anda.</li>
        <li><strong>Meja Kerja Eksekutif:</strong> Meja kerja yang lebih besar dan eksklusif, cocok untuk profesional yang membutuhkan ruang kerja yang nyaman dan produktif.</li>
        <li><strong>Balkon Pribadi:</strong> Kamar premium juga dilengkapi dengan balkon pribadi, tempat Anda bisa menikmati pemandangan dan udara segar setiap saat.</li>
    </ul>

    <p>
        Kami berharap dengan penjelasan ini, Anda dapat memilih tipe kamar yang paling sesuai dengan kebutuhan dan preferensi Anda. Setiap tipe kamar dirancang untuk memberikan kenyamanan terbaik bagi Anda selama tinggal di Kos Kami. Jika Anda memiliki pertanyaan lebih lanjut tentang fasilitas yang tersedia, jangan ragu untuk menghubungi kami. Kami siap membantu Anda menemukan kamar yang paling cocok dengan kebutuhan Anda.
    </p>",
            ],
            [
                'name' => 'rule',
                'value' => "<ul>
        <li>
            <strong>Jam Malam:</strong> Penghuni diharapkan sudah berada di dalam kos sebelum jam 22:00. Pintu kos akan dikunci pada jam tersebut, dan tidak diperkenankan untuk keluar masuk setelah jam tersebut kecuali dalam keadaan darurat.
        </li>
        <li>
            <strong>Kebersihan:</strong> Penghuni wajib menjaga kebersihan kamar dan area bersama. Setiap penghuni bertanggung jawab atas kebersihan area yang mereka gunakan, termasuk kamar mandi, dapur, dan ruang tamu.
        </li>
        <li>
            <strong>Pembayaran Sewa:</strong> Pembayaran sewa kamar dilakukan setiap awal bulan, paling lambat tanggal 5. Keterlambatan pembayaran akan dikenakan denda sebesar Rp50.000 per hari. Jika penghuni menunggak lebih dari 1 bulan, maka akan diberikan peringatan tertulis.
        </li>
        <li>
            <strong>Tamu:</strong> Tamu diperbolehkan berkunjung dari pukul 08:00 hingga 20:00. Penghuni harus melaporkan kedatangan tamu ke pengelola kos dan bertanggung jawab atas perilaku tamu mereka selama berada di kos. Tamu tidak diperkenankan untuk menginap.
        </li>
        <li>
            <strong>Penggunaan Fasilitas:</strong> Penghuni diperbolehkan menggunakan fasilitas umum seperti dapur dan ruang tamu, tetapi harus merawatnya dengan baik. Kerusakan yang disebabkan oleh kelalaian akan menjadi tanggung jawab penghuni yang bersangkutan.
        </li>
        <li>
            <strong>Keamanan:</strong> Penghuni diharapkan untuk selalu menjaga keamanan kos, termasuk menutup dan mengunci pintu gerbang saat keluar masuk. Barang-barang berharga harus disimpan dengan aman, dan kos tidak bertanggung jawab atas kehilangan barang pribadi.
        </li>
        <li>
            <strong>Kebisingan:</strong> Penghuni diharapkan untuk menjaga ketenangan, terutama di malam hari. Hindari kegiatan yang menimbulkan kebisingan setelah jam 22:00 agar tidak mengganggu penghuni lain.
        </li>
        <li>
            <strong>Perubahan Kamar:</strong> Penghuni yang ingin berpindah kamar harus mendapat izin dari pengelola kos. Segala perubahan akan didiskusikan terlebih dahulu dengan pengelola sebelum keputusan final diambil.
        </li>
        <li>
            <strong>Larangan:</strong> Dilarang membawa atau mengonsumsi narkotika, minuman keras, atau barang-barang terlarang lainnya di dalam area kos. Pelanggaran terhadap aturan ini akan berakibat pada pengusiran tanpa pengembalian uang sewa.
        </li>
        <li>
            <strong>Pelaporan Masalah:</strong> Jika terjadi masalah atau kerusakan di kos, penghuni diharapkan segera melaporkan kepada pengelola untuk penanganan lebih lanjut. Pengelola kos berkomitmen untuk menindaklanjuti setiap laporan secepat mungkin.
        </li>
    </ul>",
            ],
            [
                'name' => 'about',
                'value' => "    <p>
        Selamat datang di Kos Kami, sebuah tempat tinggal yang nyaman dan aman untuk Anda yang sedang mencari hunian sementara di kota ini. Kos Kami berdiri sejak tahun 2010 dan telah menjadi pilihan utama bagi banyak mahasiswa, pekerja, dan profesional muda yang membutuhkan tempat tinggal yang tenang dan terjangkau. Dengan lokasi yang strategis di pusat kota, Kos Kami menawarkan akses mudah ke berbagai fasilitas umum seperti kampus, pusat perbelanjaan, dan transportasi umum.
    </p>

    <p>
        Kami percaya bahwa kenyamanan dan keamanan adalah hal yang paling penting dalam memilih tempat tinggal. Oleh karena itu, Kos Kami dilengkapi dengan berbagai fasilitas yang dirancang untuk memenuhi kebutuhan sehari-hari Anda. Setiap kamar di Kos Kami dirancang dengan tata ruang yang efisien dan dilengkapi dengan perabotan modern seperti tempat tidur, meja belajar, lemari pakaian, dan AC. Selain itu, kami juga menyediakan akses internet berkecepatan tinggi gratis untuk menunjang kebutuhan kerja atau belajar Anda.
    </p>

    <p>
        Selain fasilitas dalam kamar, Kos Kami juga menyediakan fasilitas umum yang bisa dinikmati oleh semua penghuni. Dapur bersama yang lengkap dengan peralatan memasak, ruang tamu yang nyaman untuk bersantai atau menerima tamu, dan kamar mandi yang bersih dengan air panas adalah beberapa fasilitas yang bisa Anda nikmati di Kos Kami. Kami juga sangat memperhatikan kebersihan dan kerapihan area kos. Oleh karena itu, kami memiliki jadwal pembersihan rutin yang dilakukan oleh petugas kebersihan kami yang terlatih dan berdedikasi.
    </p>

    <p>
        Keamanan penghuni adalah prioritas utama kami. Kos Kami dilengkapi dengan sistem keamanan 24 jam, termasuk CCTV yang dipasang di area strategis dan pintu gerbang yang selalu terkunci untuk memastikan hanya penghuni dan tamu yang diizinkan yang bisa masuk. Kami juga memiliki petugas keamanan yang siap menjaga dan mengawasi area kos selama 24 jam penuh.
    </p>

    <p>
        Kami memahami bahwa setiap penghuni memiliki kebutuhan dan preferensi yang berbeda-beda. Oleh karena itu, kami menawarkan berbagai tipe kamar yang bisa disesuaikan dengan anggaran dan kebutuhan Anda. Mulai dari kamar single yang cocok untuk satu orang, hingga kamar double yang lebih luas dan bisa ditempati bersama teman. Kami juga menyediakan opsi pembayaran yang fleksibel, sehingga Anda bisa memilih metode yang paling sesuai dengan kondisi keuangan Anda.
    </p>

    <p>
        Di Kos Kami, kami tidak hanya menyediakan tempat tinggal, tetapi juga komunitas yang ramah dan suportif. Kami sering mengadakan acara-acara sosial seperti makan malam bersama, nonton bareng, dan diskusi kelompok yang bisa diikuti oleh semua penghuni. Ini adalah kesempatan yang baik untuk berkenalan dan menjalin hubungan baik dengan sesama penghuni, sehingga Anda tidak merasa sendirian meskipun jauh dari keluarga.
    </p>

    <p>
        Kami berkomitmen untuk memberikan pelayanan terbaik bagi semua penghuni Kos Kami. Tim manajemen kami selalu siap membantu Anda dengan berbagai kebutuhan atau masalah yang mungkin Anda hadapi selama tinggal di sini. Kami juga terbuka terhadap masukan dan saran dari penghuni untuk terus meningkatkan kualitas layanan kami.
    </p>

    <p>
        Terima kasih telah mempertimbangkan Kos Kami sebagai tempat tinggal Anda. Kami berharap bisa menjadi rumah kedua yang nyaman dan aman untuk Anda selama berada di kota ini. Jika Anda memiliki pertanyaan lebih lanjut atau ingin melihat langsung fasilitas yang kami tawarkan, jangan ragu untuk menghubungi kami atau datang langsung ke Kos Kami. Kami dengan senang hati akan membantu Anda menemukan kamar yang paling sesuai dengan kebutuhan dan preferensi Anda.
    </p>",
            ],
            [
                'name' => 'telepon',
                'value' => "+6281234567890",
            ],
            [
                'name' => 'description',
                'value' => '    <p>
        Selamat datang di kos-kosan pusat kota kami! Fasilitas modern, furnitur lengkap, koneksi internet cepat,
        dan keamanan 24 jam. Akses mudah ke perbelanjaan, transportasi, dan fasilitas penting lainnya. Temukan
        atmosfer ramah di kos-kosan bersih kami. Hubungi kami sekarang untuk info lebih lanjut dan bergabung
        dengan komunitas dinamis kami! </p>',
            ],
            [
                'name' => 'notifikasi',
                'value' => '07.00',
            ],
        ]);
    }
}
