<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto max-w-lg w-full bg-white pb-20">
        <div class="bg-blue pt-2 flex flex-col justify-center rounded-b-large items-center text-white drop-shadow-down">
            <h2 class="text-5xl font-bold">HOME</h2>
            <img src="https://picsum.photos/200" alt="" class="mt-4">
            <p class="p-5 pb-8 font-light text-slate-300">
                Selamat datang di kos-kosan pusat kota kami! Fasilitas modern, furnitur lengkap, koneksi internet cepat,
                dan keamanan 24 jam. Akses mudah ke perbelanjaan, transportasi, dan fasilitas penting lainnya. Temukan
                atmosfer ramah di kos-kosan bersih kami. Hubungi kami sekarang untuk info lebih lanjut dan bergabung
                dengan komunitas dinamis kami! </p>
        </div>

        <div class="flex justify-center px-20 pt-10 text-black">
            <div class="grid grid-cols-2 gap-3">
                <div class="card">
                    <a href="/room-list">
                        <div class="card bg-bluebg shadow-xl">
                            <figure class="p-2">
                                <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                    alt="Shoes" class="rounded-xl" />
                            </figure>
                        </div>
                    </a>
                    <small class="text-center">Room</small>
                </div>
                <div class="card">
                    <div class="card bg-bluebg shadow-xl">
                        <figure class="p-2">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                alt="Shoes" class="rounded-xl" />
                        </figure>
                    </div>
                    <small class="text-center">Room</small>
                </div>
                <div class="card">
                    <div class="card bg-bluebg shadow-xl">
                        <figure class="p-2">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                alt="Shoes" class="rounded-xl" />
                        </figure>
                    </div>
                    <small class="text-center">Room</small>
                </div>
                <div class="card">
                    <div class="card bg-bluebg shadow-xl">
                        <figure class="p-2">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                alt="Shoes" class="rounded-xl" />
                        </figure>
                    </div>
                    <small class="text-center">Room</small>
                </div>
            </div>
        </div>

        @include('user.components.bottom-nav')
    </div>
</body>

</html>
