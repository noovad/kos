<div>
    @section('title', $title ?? '')
    <div class="swiper mySwiper h-52 mt-4">
        <div class="swiper-wrapper">
            {{-- if photo nil add dummy photo --}}
            @foreach ($photo as $item)
            <div class="swiper-slide size-44">
                <img src="{{ asset('storage/photos/' . $item['url']) }}" alt="Room Type">
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="mt-2 mb-4 text-center">
        <h3 class="text-xl font-semibold text-blue">{{ $data->name }}</h3>
        <small class="-m-1 mb-4">Rp. {{ $data->price }} </small>
    </div>
    <div class="flex flex-col w-full p-3 pb-40 bg-blue drop-shadow-up text-white">
        <p class="pl-5 text-left">Fasilitas :</p>
        <small class=" pl-5 text-left"> {{ $data->description }}</small>
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