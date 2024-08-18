<div>
    @section('title', $title ?? '')

    <div class="px-2 mt-4 mb-20">
        @foreach ($roomtype as $item)
            <div class="card border border-grey text-black mb-4">
                <div class="grid grid-cols-7 gap-2 p-2">
                    <div class="col-span-3  rounded-lg">
                        <p class="pl-3 -mb-2">{{ $item->name }}</p>
                        @if ($item->available == false)
                            <small class="pl-3 text-red-500">Penuh</small>
                        @else
                            <small class="pl-3 text-green">Tersedia</small>
                        @endif
                    </div>
                    <div class="col-span-3 flex flex-col justify-center">
                        <small>Rp {{ number_format($item->price, 0, ',', '.') }}</small>
                    </div>
                    <div class="expand-button col-span-1 flex flex-col justify-center">
                        <div class="col-span-1 rounded-lg flex flex-col justify-end">
                            <a href="{{ route('user.room-detail', str_replace(' ', '_', $item->name)) }}" class="btn btn-xs bg-blue border-none text-white">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
