<div>
    @section('title', $title ?? '')

    @php
    $cards = [
        ['title' => 'Status Pembayaran (Kamar)', 'route' => 'admin.transaction-room'],
        ['title' => 'Laporan Keuangan', 'route' => 'admin.transaction-report'],
        ['title' => 'Transaksi', 'route' => 'admin.transaction-index'],
        ['title' => 'Draft Transaksi', 'route' => 'admin.transaction-post'],
    ];
    @endphp

    <div class="carousel-item w-full">
        <div class="w-full">
            @include('components.chart.monthly-financial-chart')
        </div>
    </div>

    <div class="carousel-item w-full">
        <div class="w-1/2 mx-auto">
            @include('components.chart.payment-status')
        </div>
    </div>

    <div class="flex w-full justify-center gap-2 py-2 pt-10">
        @for ($i = 1; $i <= 2; $i++)
            <a class="btn btn-xs bg-gray-200" onclick="showCarousel({{ $i }})">{{ $i }}</a>
        @endfor
    </div>

    <script>
        function showCarousel(index) {
            const carouselItems = document.getElementsByClassName('carousel-item');
            const buttons = document.getElementsByClassName('btn');

            for (let i = 0; i < carouselItems.length; i++) {
                carouselItems[i].style.display = 'none';
            }

            carouselItems[index - 1].style.display = 'block';

            for (let i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('active');
            }

            buttons[index - 1].classList.add('active');
        }

        document.addEventListener("DOMContentLoaded", function() {
            showCarousel(1);
        });
    </script>

    <div>
        @foreach ($cards as $card)
            <div class="card border border-grey text-black mt-4 mb-4">
                <div class="grid grid-cols-7 gap-2 p-2">
                    <div class="col-span-6 rounded-lg">
                        <p class="pl-3 -mb-2">{{ $card['title'] }}</p>
                    </div>
                    <div class="col-span-1 flex flex-col justify-center">
                        <a href="{{ route($card['route']) }}" class="btn btn-xs bg-blue text-white border-none">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
