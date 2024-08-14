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
            <h2 class="text-5xl font-bold pb-8">Login</h2>
        </div>

        <div class="flex justify-center">
            <img src="https://picsum.photos/200" alt="" class="mt-4">
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
                    <small class="text-center">Fasilitas</small>
                </div>
                <div class="card">
                    <div class="card bg-bluebg shadow-xl">
                        <figure class="p-2">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                alt="Shoes" class="rounded-xl" />
                        </figure>
                    </div>
                    <small class="text-center">Aturan</small>
                </div>
                <div class="card">
                    <div class="card bg-bluebg shadow-xl">
                        <figure class="p-2">
                            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                                alt="Shoes" class="rounded-xl" />
                        </figure>
                    </div>
                    <small class="text-center">Tentang Kami</small>
                </div>
            </div>
        </div>

        @include('component.bottom-nav-user')
    </div>
</body>

</html>
