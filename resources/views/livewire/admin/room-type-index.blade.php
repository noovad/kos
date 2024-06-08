<div>

    <div class="mt-4 mb-4">
        <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type.create') }}">+Tambah Tipe
            Kamar</a>
    </div>
    <hr>
    <div wire:loading>
        <x-loading-message message="Memperbarui data..." />
    </div>


    @foreach ($data as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-11 gap-2 p-2">
                <div class="col-span-5 rounded-lg">
                    <p class="pl-3 -mb-2">{{ $item->name }}</p>
                    <small class="pl-3">status</small>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <a class="btn btn-xs bg-blue text-white border-none"
                        href="{{ route('admin.room-type.update', ['id' => $item->id]) }}">Ubah</a>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none" wire:click='destroy({{ $item->id }})'
                        wire:confirm='Hapus data?'>Hapus</button>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <a class="btn btn-xs bg-blue text-white border-none"
                        href="{{ route('admin.room-type.detail', ['id' => $item->id]) }}">Detail</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
