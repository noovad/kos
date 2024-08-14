@extends('layouts.app')


@section('judul', 'Room')

@section('content')
    <div class="swiper mySwiper h-52 mt-4">
        <div class="swiper-wrapper">
            <div class="swiper-slide size-44">
                <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
            </div>
            <div class="swiper-slide size-44">
                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
            </div>
            <div class="swiper-slide size-44">
                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="mt-2 mb-2 text-center">
        <h3 class="text-xl font-semibold text-blue">Nama Tipe Kamar</h3>
        <small class="-m-1 mb-4">Rp. 239.0390</small>
    </div>
    <div class="flex justify-center px-20 py-5 text-black">
        <div class="grid grid-cols-4 gap-3">
            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
            <div class="size-16 rounded-md bg-bluebg text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center">
                <span class="text-2xl font-bold">1</span>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full p-3 pb-40 bg-blue drop-shadow-up text-white">
        <p class="pl-5 text-left">Fasilitas :</p>
        <small class=" pl-5 text-left">Fasilitas 1</small>
        <small class=" pl-5 text-left">Fasilitas 1</small>
        <small class=" pl-5 text-left">Fasilitas 1</small>
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
@endsection
