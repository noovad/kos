<div class="m-2">
    <livewire:admin.transaction-post />
    @foreach ($transaction as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6  rounded-lg">
                    <p class="pl-3 -mb-2">{{ $item->user->name }}</p>
                </div>
                <div class="col-span-1 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        onclick="document.getElementById('modalDetail{{ $item->id }}').showModal()">Detail</button>
                </div>
            </div>
        </div>

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
                            <p>: Rp {{ number_format($item->amount, 0, ',', '.')}}</p>
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

                <div class="modal-action pt-4 m-0">
                    <form method="dialog">
                        <button class="btn btn-sm bg-blue text-white border-none">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endforeach

</div>
