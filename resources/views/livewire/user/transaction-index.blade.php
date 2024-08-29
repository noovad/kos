<div>
    @section('title', $title ?? '')
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
    </div>

    @foreach ($transaction as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3 -mb-1">{{ $item->user->name }} -
                        {{ \Carbon\Carbon::parse($item->period)->format('m-Y') }}</p>
                    @if ($item->status == 'Belum Dibayar')
                        <small class="text-yellow-500 pl-3">Belum Dibayar</small>
                    @elseif ($item->status == 'Sudah Dibayar')
                        <small class="text-green-500 pl-3">Sudah Dibayar</small>
                    @elseif ($item->status == 'Tidak Dibayar')
                        <small class="text-red-500 pl-3">Tidak Dibayar</small>
                    @endif
                </div>
                <div class="col-span-1 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        onclick="document.getElementById('modalDetail{{ $item->id }}').showModal()">Detail</button>
                </div>
            </div>
        </div>

        {{-- Modal Detail --}}
        <dialog wire:ignore.self id="modalDetail{{ $item->id }}" class="modal">
            <div class="modal-box w-5/12 max-w-5xl min-w-[360px]">
                <h3 class="font-bold text-base text-center text-blue">Detail Tagihan</h3>

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
