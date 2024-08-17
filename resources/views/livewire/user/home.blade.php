<div>
    @section('title', $title ?? '')

    <div class="flex justify-center" style="scale: 1/1">
        <img src="{{ asset('asset/icon_login.png') }}" class="px-40" alt="">
    </div>
    <p class="p-5 pb-8">
        Selamat datang di kos-kosan pusat kota kami! Fasilitas modern, furnitur lengkap, koneksi internet cepat,
        dan keamanan 24 jam. Akses mudah ke perbelanjaan, transportasi, dan fasilitas penting lainnya. Temukan
        atmosfer ramah di kos-kosan bersih kami. Hubungi kami sekarang untuk info lebih lanjut dan bergabung
        dengan komunitas dinamis kami! </p>
    <div class="flex justify-center px-4 pt-4 text-black">
        <div class="grid grid-cols-2 gap-6 w-full px-20">
            <div class="card">
                <a href="{{ route('user.room-index') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-bed-double text-blue">
                            <path d="M2 20v-8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v8" />
                            <path d="M4 10V6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4" />
                            <path d="M12 4v6" />
                            <path d="M2 18h20" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('user.room-detail') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-notebook-pen text-blue">
                            <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                            <path d="M2 6h4" />
                            <path d="M2 10h4" />
                            <path d="M2 14h4" />
                            <path d="M2 18h4" />
                            <path
                                d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-index') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-book-marked text-blue">
                            <path d="M10 2v8l3-3 3 3V2" />
                            <path
                                d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-room') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users text-blue">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
