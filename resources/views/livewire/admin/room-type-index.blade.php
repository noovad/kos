<div class="m-2">

    <div class="mt-4 mb-4">
        <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type.create') }}">+Tambah Tipe
            Kamar</a>
    </div>
    <hr>
    <div wire:loading>
        Saving post...
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
                        href="{{ route('admin.room-type.update', ['id' => $item->id]) }}">                                    <svg xmlns="http://www.w3.org/2000/svg" color="white" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg></a>
                </div>

                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"  onclick="document.getElementById('deleteModal{{ $item->id }}').showModal()">                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="white" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                      </svg></button>
                </div>

                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <a class="btn btn-xs bg-blue text-white border-none"
                        href="{{ route('admin.room-type.detail', ['id' => $item->id]) }}">                                    <svg xmlns="http://www.w3.org/2000/svg" color="white" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                          </svg></a>
                </div>
            </div>
        </div>

        <dialog wire:ignore.self id="deleteModal{{$item->id}}" class="modal">
            <div class="modal-box">
                <p class="text-center">Hapus Data???</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-xs bg-red-600 text-white border-none"
                            wire:click='destroy({{ $item->id }})'>Hapus</button>
                        <button class="btn btn-xs bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endforeach
</div>
