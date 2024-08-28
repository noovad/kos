<div>
    @section('title', $title ?? '')
    <div class="ps-8 flex justify-end">
        <ul class="list-disc list-inside">
            <li><small>Biru : Sudah Bayar</small></li>
            <li><small>Abu-abu : Belum Bayar</small></li>
        </ul>
    </div>

    @foreach ($data as $item)
        <div class="m-2 border">
            <div class="m-2 mb-0 p-2 rounded-md bg-blue text-white text-center">
                <span class="text-lg font-bold">{{ $item['room_type'] }}</span>
            </div>
            <div class="flex justify-center py-5 text-black">
                <div class="grid grid-cols-4 gap-3">
                    @foreach ($item['rooms'] as $room)
                        @php
                            $bgColor = 'bg-white text-gray-200';
                            if ($room['user']) {
                                if ($room['transaction_status'] == 'Belum Dibayar') {
                                    $bgColor = 'bg-bluebg text-white';
                                } elseif ($room['transaction_status'] == 'Belum Ada Tagihan' || $room['transaction_status'] == 'Tidak Dibayar') {
                                    $bgColor = 'bg-red-100 text-white';
                                } elseif ($room['transaction_status'] == 'Sudah Dibayar') {
                                    $bgColor = 'bg-blue text-white';
                                }
                            }
                        @endphp
                        <div class="size-16 rounded-md {{ $bgColor }} flex justify-center items-center"
                            @if ($room['user']) onclick="document.getElementById('modalDetail{{ $room['room'] }}').showModal()" role="button" @endif>
                            <span class="text text-center font-bold">{{ $room['room'] }}</span>
                        </div>

                        {{-- Modal Detail --}}
                        <dialog wire:ignore.self id="modalDetail{{ $room['room'] }}" class="modal">
                            <div class="modal-box w-5/12 max-w-5xl min-w-[500px]">
                                <h3 class="font-bold text-lg text-center text-blue">{{ $room['room'] }}</h3>

                                <div class="card border border-grey text-black mt-2 mb-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Nama</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>: {{ $room['room'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-grey text-black mt-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Penghuni</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>: {{ $room['user'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-grey text-black mt-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Status</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>: {{ $room['transaction_status'] ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @if ($room['transaction_status'] != 'Sudah Dibayar')
                                    <div class="card border border-grey text-black mt-2">
                                        <div class="grid grid-cols-7 pl-2">
                                            <div class="col-span-3 rounded-lg">
                                                <p class="p-1 mb-0">Tenggat Pembayaran</p>
                                            </div>
                                            <div class="expand-button col-span-4 flex flex-col justify-center">
                                                <p>: {{ $room['due_date'] ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="modal-action pt-4 m-0">
                                    <form method="dialog">
                                        <button class="btn btn-sm bg-blue text-white border-none">Tutup</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
