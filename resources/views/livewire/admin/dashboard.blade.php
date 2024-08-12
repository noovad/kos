<div>
    @section('title', $title ?? '')
    <div class="carousel w-full">
        <div id="item1" class="carousel-item w-full pt-10">
            <div class="w-full">
                <!-- Chart Keuangan per Bulan -->
                @include('components.chart.monthly-financial-chart', ['yearly' => $yearly])
            </div>
        </div>
        <div id="item2" class="carousel-item w-full pt-10">
            <div class="w-full">
                <!-- Chart keterisian kamar saat ini berdasarkan tipe, dengan jumlah kamar -->
                @include('components.chart.room-occupied')
            </div>
        </div>
        <div id="item3" class="carousel-item w-full">
            <div class="w-full">
                <!-- chart keterisian kamar perbulan dalam setahun berdsarkan bulan-->
                @include('components.chart.monthly-room-occupancy')
            </div>
        </div>
    </div>
    <div class="flex w-full justify-center gap-2 py-2 pt-10">
        <a href="#item1" class="btn btn-xs bg-gray-200">1</a>
        <a href="#item2" class="btn btn-xs bg-gray-200">2</a>
        <a href="#item3" class="btn btn-xs bg-gray-200">3</a>
    </div>

    <div class="flex justify-center px-4 pt-4 text-black">
        <div class="grid grid-cols-2 gap-6">
            <div class="card">
                <a href="/room-list">
                    <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                        <!-- persentase pembayaran bulanan -->
                        <p>900 %</p>
                    </div>
                </a>
            </div>
            <div class="card">
                <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                    <!-- nilai keuangan masuk bulan tersebut -->
                    <p>Rp. 1.000.000</p>
                </div>
            </div>
            <div class="card">
                <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                    <!-- Chart status pembayaran per Bulan -->
                    @include('components.chart.payment-status')
                </div>
            </div>
            <div class="card">
                <div class="card bg-gray-200 shadow-xl p-2" style="aspect-ratio: 1/1;">
                    <!-- Chart keterisian kamar saat-->
                    @include('components.chart.room-occupied-pie')
                </div>
            </div>
        </div>
    </div>
</div>