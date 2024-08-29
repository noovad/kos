<div>
    @section('title', $title ?? '')
    <div class="carousel-item w-full">
        <div class="w-full">
            @include('components.chart.monthly-financial-chart')
        </div>
    </div>
    <div class="carousel-item w-full">
        <div class="w-full">
            @include('components.chart.room-occupied')
        </div>
    </div>
    <div class="flex w-full justify-center gap-2 py-2 pt-10">
        <a class="btn btn-xs bg-gray-200" onclick="showCarousel(1)">1</a>
        <a class="btn btn-xs bg-gray-200" onclick="showCarousel(2)">2</a>
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


    <div class="flex justify-center px-4 pt-4 text-black">
        <div class="grid grid-cols-2 gap-6">
            <div class="card">
                <a href="{{ route('admin.transaction-room') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <div class="stat-title text-blue font-semibold text-left">Tagihan Bulan Ini</div>
                        <div class="stat-value m-4 text-6xl text-blue text-center">{{ $percentage }} %</div>
                        <div class="stat-Title text-blue font-semibold text-right">Sudah Dibayar</div>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-report') }}">
                    <div class="card bg-gray-200 shadow-xl p-8"
                        style="aspect-ratio: 1/1; display: flex; justify-content: center;">
                        <div class="stat-title text-blue text-sm font-semibold text-left">Pemasukan Bulan Ini</div>
                        <div class="stat-value my-4 text-5xl text-blue text-center">{{ $income }}</div>
                        <div class="stat-Title text-blue font-semibold text-right">Juta</div>
                    </div>
                </a>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-index') }}">
                    <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                        @include('components.chart.payment-status')
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="{{ route('admin.transaction-room') }}">
                    <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                        @include('components.chart.room-occupied-pie')
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
