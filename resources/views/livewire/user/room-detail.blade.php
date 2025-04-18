<div>
    @section('title', $title ?? '')

    <div class="swiper mySwiper mt-4">
        <div class="swiper-wrapper">
            @if ($roomType->photos->isEmpty())
                <div class="swiper-slide size-96">
                    <img src="{{ asset('asset/dummy.jpg') }}" class="w-full" alt="Gambar">
                </div>
            @endif
            @foreach ($roomType->photos as $item)
                <div class="swiper-slide size-96">
                    <img src="{{ asset('storage/photos/' . $item->url) }}" class="w-full" alt="Gambar">
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="mt-2 mb-2 text-center">
        <h3 class="text-xl font-semibold text-blue">{{ $roomType->name }}</h3>
        <small class="-m-1 mb-4">Rp. {{ number_format($roomType->price, 0, ',', '.') }}</small>
    </div>
    <div class="ps-8 flex justify-end">
        <ul class="list-none space-y-2">
            <li class="flex items-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#304E6E" class="mr-2">
                    <rect width="16" height="16" x="0" y="0" rx="2" />
                </svg>
                <small>Tersedia</small>
            </li>
            <li class="flex items-center text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6b7280" class="mr-2">
                    <rect width="16" height="16" x="0" y="0" rx="2" />
                </svg>
                <small>Tidak Tersedia</small>
            </li>
        </ul>
    </div>

    <div class="flex justify-center px-20 py-5 text-black">
        <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
            @foreach ($room as $item)
                @if ($item->user == null)
                    <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                        <span class="text-lg text-center font-bold">{{ $item->name }}</span>
                    </div>
                @else
                    <div class="size-16 rounded-md bg-gray-200 text-white flex justify-center items-center">
                        <span class="text-lg text-center font-bold">{{ $item->name }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="p-8 drop-shadow-up border-4 border-blue rounded-lg">
        {!! $roomType->description !!}
    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
</div>
