<div>
    @section('title', $title ?? '')

    <style>
        .truncate {
            max-width: 450px;
        }
    </style>
    <div class="mx-auto text-center">
        <div x-data="{ selected: 'Belum Dibayar' }" class="w-full my-4">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-full flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'Belum Dibayar'" wire:click="$set('filter', 'Belum Dibayar')">Belum
                            Dibayar</button>
                    </div>
                    <div class="w-full flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'Sudah Dibayar'" wire:click="$set('filter', 'Sudah Dibayar')">Sudah
                            Dibayar</button>
                    </div>
                    <div class="w-full flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'Tidak Dibayar'" wire:click="$set('filter', 'Tidak Dibayar')">Tidak
                            Dibayar</button>
                    </div>
                </div>
                <span
                    :class="{
                        'left-1 text-blue font-semibold': selected === 'Belum Dibayar',
                        'left-1/3 text-blue font-semibold': selected === 'Sudah Dibayar',
                        'left-2/3 text-blue font-semibold': selected === 'Tidak Dibayar'
                    }"
                    x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/3 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute"></span>
            </div>
        </div>

        <div class="flex justify-end">
            @include('components.search-bar')
        </div>
    </div>

    @foreach ($transaction as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-5 rounded-lg">
                    <p class="pl-3 -mb-1 truncate">{{ $item->user->name }} -
                        {{ $item->period ? date('m-Y', strtotime($item->period)) : $item->description }}</p>
                    @if ($item->status == 'Belum Dibayar')
                        <small class="text-yellow-500 pl-3">Belum Dibayar</small>
                    @elseif ($item->status == 'Sudah Dibayar')
                        <small class="text-green-500 pl-3">Sudah Dibayar</small>
                    @elseif ($item->status == 'Tidak Dibayar')
                        <small class="text-red-500 pl-3">Tidak Dibayar</small>
                    @endif
                </div>
                <div class="col-span-1 flex flex-col justify-center">
                    @if ($item->status == 'Tidak Dibayar')
                        <button class="btn btn-xs bg-red-500 text-white border-none"
                            onclick="document.getElementById('modalDelete{{ $item->id }}').showModal()"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="white"
                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg></button>
                    @endif
                </div>
                <div class="col-span-1 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-red border-none"
                        onclick="document.getElementById('modalDetail{{ $item->id }}').showModal()"><svg
                            xmlns="http://www.w3.org/2000/svg" color="white" width="16" height="16"
                            fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg></button>
                </div>
            </div>
        </div>

        {{-- -- Modal Delete-- --}}
        <dialog wire:ignore.self id="modalDelete{{ $item->id }}" class="modal">
            <div class="modal-box">
                <p class="text-center">Hapus Data???</p>
                <div class="modal-action">
                    <button class="btn btn-xs bg-red-600 text-white border-none"
                        wire:click='delete({{ $item->id }})'>Hapus</button>
                    <form method="dialog">
                        <button class="btn btn-xs bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
        </dialog>

        {{-- Modal Detail --}}
        <dialog wire:ignore.self id="modalDetail{{ $item->id }}" class="modal">
            <div class="modal-box w-5/12 max-w-5xl min-w-[360px]">
                <h3 class="font-bold text-lg text-center text-blue">Detail Tagihan</h3>

                <div class="card border border-grey text-black mt-2 mb-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0 text-base">Nama</p>
                        </div>
                        <div class="col-span-4 flex flex-col justify-center">
                            <div class="flex items-start">
                                <span class="text-base">:</span>
                                <p class="text-base ml-2">{{ $item->user_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-2 mb-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0 text-base">Kamar</p>
                        </div>
                        <div class="col-span-4 flex flex-col justify-center">
                            <div class="flex items-start">
                                <span class="text-base">:</span>
                                <p class="text-base ml-2">{{ $item->room }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0 text-base">Tagihan</p>
                        </div>
                        <div class="col-span-4 flex flex-col justify-center">
                            <div class="flex items-start">
                                <span class="text-base">:</span>
                                <p class="text-base ml-2">Rp {{ number_format($item->amount, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Jika sudah dibayar, maka tidak muncul --}}
                @if ($item->status != 'Sudah Dibayar')
                    @if ($item->status != 'Tidak Dibayar')
                        <div class="card border border-grey text-black mt-2">
                            <div class="grid grid-cols-7 pl-2">
                                <div class="col-span-3 rounded-lg">
                                    <p class="p-1 mb-0 text-base">Kode Pembayaran</p>
                                </div>
                                <div class="col-span-4 flex flex-col justify-center">
                                    <div class="flex items-start">
                                        <span class="text-base">:</span>
                                        <p class="text-base ml-2">{{ $item->payment_code }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card border border-grey text-black mt-2">
                        <div class="grid grid-cols-7 pl-2">
                            <div class="col-span-3 rounded-lg">
                                <p class="p-1 mb-0 text-base">Tenggat Pembayaran</p>
                            </div>
                            <div class="col-span-4 flex flex-col justify-center">
                                <div class="flex items-start">
                                    <span class="text-base">:</span>
                                    <p class="text-base ml-2">{{ $item->due_date ? date('d-m-Y', strtotime($item->due_date)) : '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card border border-grey text-black mt-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0 text-base">Status</p>
                        </div>
                        <div class="col-span-4 flex flex-col justify-center">
                            <div class="flex items-start">
                                <span class="text-base">:</span>
                                <p class="text-base ml-2">{{ $item->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-2 mb-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0 text-base">Keterangan</p>
                        </div>
                        <div class="col-span-4 flex flex-col justify-center">
                            <div class="flex items-start">
                                <span class="text-base">:</span>
                                <p class="text-base ml-2">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="modal-action pt-4 m-0">
                    <form method="dialog">
                        <button class="btn btn-sm bg-blue text-white border-none">Tutup</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endforeach
    <div class="flex justify-between items-center pt-2">
        <div>
            <select wire:model.lazy="pagination" class="select select-sm text-xs border-black-500">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="75">75</option>
            </select>
        </div>
        <div>
            {{ $transaction->links() }}
        </div>
    </div>
</div>
