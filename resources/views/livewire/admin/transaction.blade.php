<div>
    @php
    $cards = [
    ['title' => '% Tagihan Terbayar', 'route' => 'admin.transaction-status'],
    ['title' => 'Laporan Keuangan', 'route' => 'admin.transaction-report'],
    ['title' => 'Transaksi', 'route' => 'admin.transaction-list'],
    ['title' => 'Draft Transaksi', 'route' => 'admin.transaction-draft'],
    ];
    @endphp

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