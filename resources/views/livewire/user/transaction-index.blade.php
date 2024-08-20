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
                        <small class="text-green-600 pl-3">Belum Dibayar</small>
                    @elseif ($item->status == 'Sudah Dibayar')
                        <small class=" pl-3">Sudah Dibayar</small>
                    @elseif ($item->status == 'Tidak Dibayar')
                        <small class="text-red-600 pl-3">Tidak Dibayar</small>
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
            <div class="modal-box w-5/12 max-w-5xl min-w-[500px]">
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
                        <div class="expand-button col-span-3 flex flex-col justify-center">
                            <p>: {{ $item->payment_code }}</p>
                        </div>
                        <div class="expand-button col-span-1 flex flex-col justify-center">
                            <button class="btn btn-xs bg-blue  text-white w-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-clipboard-copy size-5">
                                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                                    <path d="M8 4H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2" />
                                    <path d="M16 4h2a2 2 0 0 1 2 2v4" />
                                    <path d="M21 14H11" />
                                    <path d="m15 10-4 4 4 4" />
                                </svg>
                            </button>
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
    <div class="flex justify-between items-center pt-2">
        <div>
            <select wire:model.lazy="paginate" class="select select-sm text-xs border-black-500">
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
