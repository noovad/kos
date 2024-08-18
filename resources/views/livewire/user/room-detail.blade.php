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
        <ul class="list-disc list-inside">
            <li><small>Biru : Tersedia</small></li>
            <li><small>Abu-abu : Tidak Tersedia</small></li>
    </div>
    <div class="flex justify-center px-20 py-5 text-black">
        <div class="grid grid-cols-4 gap-3">
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
        <p class="text-left"> {{ $roomType->description }} </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
