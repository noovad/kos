<div class="m-2">

    <div class="mt-4 mb-4">
        <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type') }}">Tipe Kamar</a>
        <button class="btn btn-xs bg-blue text-white border-none" onclick="modal_create.showModal()">+ Tambah
            Kamar</button>
    </div>
    <hr>
    <div class="mt-4 mb-4">
        <details class="dropdown">
            <summary class="btn btn-xs bg-blue text-white border-none">Pilih Tipe</summary>
            <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                <li><a>Item 1</a></li>
                <li><a>Item 2</a></li>
            </ul>
        </details>
    </div>
    @foreach ($data as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-11 gap-2 p-2">
                <div class="col-span-5 rounded-lg">
                    <p class="pl-3 -mb-2">{{ $item->name }}</p>
                    <small class="pl-3">status</small>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        onclick="modal_update.showModal()">Ubah</button>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        wire:click='openDelete()'>Hapus</button>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        wire:click='detail({{ $item->id }})'>Detail</button>
                </div>
            </div>
        </div>
        {{-- Modal Detail --}}
        <dialog wire:ignore.self id="modal_detail" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg text-center text-blue">Detail Kamar</h3>
    
                <div class="card border border-grey text-black mt-2 mb-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0">Nama</p>
                        </div>
                        <div class="expand-button col-span-4 flex flex-col justify-center">
                            <p>: {{ $detail->name ?? ""}}</p>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-2 mb-2 ">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0">Tipe</p>
                        </div>
                        <div class="expand-button col-span-4 flex flex-col justify-center">
                            <p>: </p>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0">Penghuni</p>
                        </div>
                        <div class="expand-button col-span-4 flex flex-col justify-center">
                            <p>: Satu</p>
                        </div>
                    </div>
                </div>
    
                <div class="modal-action pt-4 m-0">
                    <form method="dialog">
                        <button class="btn btn-sm bg-blue text-white border-none">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
        {{-- Modal Delete --}}
        <dialog id="modal_delete" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg text-center text-red-500">Hapus data?</h3>
    
                <div class="flex justify-center items-center">
                    <div class="modal-action mx-4">
                        <form>
                            <button class="btn btn-sm bg-red-500 text-white border-none">Hapus</button>
                        </form>
                    </div>
                    <div class="modal-action mx-4">
                        <form method="dialog">
                            <button class="btn btn-sm bg-blue text-white border-none">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </dialog>
        @endforeach



    {{-- Modal Update --}}
    <dialog id="modal_update" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg text-center text-blue">Ubah Kamar</h3>

            <input type="text" placeholder="Type here" class="input input-sm input-bordered w-full" />

            <select class="select select-sm select-bordered w-full max-w-xs mt-4">
                <option disabled selected>Tipe Kamar</option>
                <option>Han Solo</option>
                <option>Greedo</option>
            </select>

            <div class="flex justify-center items-center">
                <div class="modal-action mx-4">
                    <form>
                        <button class="btn btn-sm bg-blue text-white border-none">Simpan</button>
                    </form>
                </div>
                <div class="modal-action mx-4">
                    <form method="dialog">
                        <button class="btn btn-sm bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </dialog>


    {{-- Modal Create --}}
    <dialog wire:ignore.self id="modal_create" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg text-center text-blue">Tambah Kamar</h3>

            <input wire:model='form.name' type="text" placeholder="Type here"
                class="input input-sm input-bordered w-full" />

            <select wire:model="form.room_type_id" class="select select-sm select-bordered w-full max-w-xs mt-4">
                <option value="">Select a room type</option>
                @foreach ($tipe as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

            <div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <small class="text-error">{{ $error }}</small><br>
                    @endforeach
                @endif
            </div>

            <div class="flex justify-center items-center">
                <div class="modal-action mx-4">
                    <button wire:click='create' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
                    <form method="dialog">
                        <button class="btn btn-sm bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
    </dialog>
    <script>
        window.addEventListener('close-modal', event => {
            document.getElementById('modal_create').close();
        })

        window.addEventListener('open-modal-detail', event => {
            document.getElementById('modal_detail').showModal();
        });

        window.addEventListener('open-modal-delete', event => {
            document.getElementById('modal_delete').showModal();
        });

    </script>
</div>
