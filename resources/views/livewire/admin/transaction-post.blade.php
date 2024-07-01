<div>
    
    <div class="mt-4 mb-4">
        <button class="btn btn-xs bg-blue text-white border-none" onclick="modalCreate.showModal()">+ Buat
            Tagihan</button>
        </div>
        <div>
            @if ($transaction->isEmpty())
                <button onclick="document.getElementById('modalUpdateAll').showModal()" class="btn btn-xs bg-blue text-white border-none" disabled>Update Semua</button>
                <button onclick="document.getElementById('modalUpdate').showModal()" class="btn btn-xs bg-blue text-white border-none" disabled>Update Terpilih</button>
            @else
                <button onclick="document.getElementById('modalUpdateAll').showModal()" class="btn btn-xs bg-blue text-white border-none">Update Semua</button>
                <button onclick="document.getElementById('modalUpdate').showModal()" class="btn btn-xs bg-blue text-white border-none">Update Terpilih</button>
            @endif
        {{-- -- Modal update all-- --}}
        <dialog wire:ignore.self id="modalUpdateAll" class="modal">
            <div class="modal-box">
                <p class="text-center">Perbarui semua draft transaksi?</p>
                <div class="modal-action">
                    <button class="btn btn-xs bg-green-600 text-white border-none"
                    wire:click='updateToUnpaid'>Perbarui</button>
                    <form method="dialog">
                        <button class="btn btn-xs bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
        </dialog>
        {{-- -- Modal update-- --}}
        <dialog wire:ignore.self id="modalUpdate" class="modal">
            <div class="modal-box">
                <p class="text-center">Perbarui draft transaksi yang dipilih?</p>
                <div class="modal-action">
                    <button class="btn btn-xs bg-green-600 text-white border-none"
                    wire:click='updateToUnpaidSelected'>Perbarui</button>
                    <form method="dialog">
                        <button class="btn btn-xs bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
        </dialog>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th class="text-center">Nama</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction as $key => $item)
            <tr class="hover">
                <td><input wire:model='selected_items' type="checkbox" value="{{ $item->id }}" class="checkbox checkbox-sm"></td>
                <td>{{$starting_number + $key}}</td>
                <td><p class="pl-3 -mb-1">{{ $item->user->name }}</p></td>
                <td><small class="text-green-600 pl-3">Draft</small></td>
                <td><button class="btn btn-xs bg-blue text-white border-none"
                        onclick="document.getElementById('modalDetail{{ $item->id }}').showModal()">Detail</button>
                </td>
            </tr>


            {{-- Modal Detail --}}
            <dialog wire:ignore.self id="modalDetail{{ $item->id }}" class="modal">
                <div class="modal-box w-5/12 max-w-5xl">
                    <h3 class="font-bold text-lg text-center text-blue">Detail Tagihan</h3>

                    <div class="card border border-grey text-black mt-2 mb-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">Nama</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: {{ $item->user_name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-grey text-black mt-2 mb-2 ">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">Kamar</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: {{ $item->room }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-grey text-black mt-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">Tagihan</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: Rp {{ number_format($item->amount, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- // jika sudah dibayar, maka tidak muncul --}}
                    <div class="card border border-grey text-black mt-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">Kode Pembayaran</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: {{ $item->payment_code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-grey text-black mt-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">Tenggat Pembayaran</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: {{ $item->due_date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-grey text-black mt-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">status</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: {{ $item->status }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card border border-grey text-black mt-2 mb-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0">Keterangan</p>
                            </div>
                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                <p>: {{ $item->description }}</p>
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
            @endforeach
        </tbody>
    </table>

    <div class="pt-2">
        {{ $transaction->links() }}
    </div>

    {{-- Modal Create --}}
    <dialog wire:ignore.self id="modalCreate" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg text-center text-blue">Buat Tagihan</h3>

            <label for="User" class="block mt-4 text-xs text-gray-700">Tagihan untuk:</label>
            <select wire:model="form.user_id" wire:model.lazy='user_selected' id="User"
                class="select select-sm text-xs select-bordered w-full max-w-xs mt-1">
                <option selected>Pilih penghuni</option>

                @foreach ($users as $itemType)
                <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                @endforeach
            </select>

            <label for="name" class="block text-xs text-gray-700 mt-1">Kamar:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
            @if (trim($user_selected)=='' ) disabled @endif value="{{ $user->room->name ?? '' }}" disabled />
            <label for="name" class="block text-xs text-gray-700 mt-1">Tagihan:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
            @if(trim($user_selected)=='' ) disabled @endif
                value="{{ number_format($user->room->roomType->price ?? 0, 0, ',', '.') }}" disabled />
            <label for="name" class="block text-xs text-gray-700 mt-1">Tenggat Pembayaran:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1" 
            @if(trim($user_selected)=='' ) disabled @endif value="{{ $user->start_date ?? '' }}" disabled />
            <label for="name" class="block text-xs text-gray-700 mt-1">Status:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
                value="Menunggu Pembayaran" disabled />


            <div>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <small class="text-error">{{ $error }}</small><br>
                @break
                @endforeach
                @endif
            </div>

            <div class="flex justify-center items-center">
                <div class="modal-action mx-4">
                    <button wire:click='create' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
                    <button wire:click='closeModal' class="btn btn-sm bg-blue text-white border-none">Batal</button>
                </div>
            </div>
    </dialog>

    <script>
        window.addEventListener('open-modal-create', event => {
        document.getElementById('modalCreate').showModal();
    })

    window.addEventListener('close-modal-create', event => {
        document.getElementById('modalCreate').close();
    })

    window.addEventListener('close-modal-update-all', event => {
        document.getElementById('modalUpdateAll').close();
    })

    window.addEventListener('close-modal-update', event => {
        document.getElementById('modalUpdate').close();
    })
    </script>
</div>