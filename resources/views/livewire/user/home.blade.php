<div>
    @section('title', $title ?? '')

    
    <div class="flex justify-center">
        <img src="https://picsum.photos/200" class="" alt="">
    </div>
    <p class="p-5 pb-8">
        Selamat datang di kos-kosan pusat kota kami! Fasilitas modern, furnitur lengkap, koneksi internet cepat,
        dan keamanan 24 jam. Akses mudah ke perbelanjaan, transportasi, dan fasilitas penting lainnya. Temukan
        atmosfer ramah di kos-kosan bersih kami. Hubungi kami sekarang untuk info lebih lanjut dan bergabung
        dengan komunitas dinamis kami! </p>
    <div class="flex justify-center px-4 pt-4 text-black">
        <div class="grid grid-cols-2 gap-6">
            <div class="card">
                <a href="{{ route('admin.transaction-room') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <div class="stat-title text-blue font-semibold text-left">Tagihan Bulan Ini</div>
                        {{-- <div class="stat-value m-4 text-6xl text-blue text-center">{{$percentage}} %</div> --}}
                        <div class="stat-Title text-blue font-semibold text-right">Sudah Dibayar</div>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-report') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <div class="stat-title text-blue font-semibold text-left">Pemasukan Bulan Ini</div>
                        {{-- <div class="stat-value m-4 text-6xl text-blue text-center">{{$income}}</div> --}}
                        <div class="stat-Title text-blue font-semibold text-right">Juta</div>
                    </div>
                </a>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-index') }}">
                    <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-room') }}">
                    <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
