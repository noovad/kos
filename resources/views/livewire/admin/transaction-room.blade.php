<div class="m-2">

    @foreach ($data as $item)
        <div class="m-2 border">
            <div class="m-2 mb-0 p-2 rounded-md bg-blue text-white text-center">
                <span class="text-lg font-bold">{{ $item->name }}</span>
            </div>
            <div class="flex justify-center py-5 text-black">
                <div class="grid grid-cols-4 gap-3">
                    @foreach ($item->rooms as $item)
                        @if (!$item->user)
                            <div class="size-16 rounded-md bg-gray-500 text-white flex justify-center items-center">
                                <span class="text text-center font-bold">{{ $item->name }}</span>
                            </div>
                        @else
                            <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center"
                                onclick="document.getElementById('modalDetail{{ $item->id }}').showModal()"
                                role="button">
                                <span class="text text-center font-bold">{{ $item->name }}</span>
                            </div>
                        @endif


                        {{-- Modal Detail --}}
                        <dialog wire:ignore.self id="modalDetail{{ $item->id }}" class="modal">
                            <div class="modal-box w-5/12 max-w-5xl">
                                <h3 class="font-bold text-lg text-center text-blue">Nama Kamar</h3>

                                <div class="card border border-grey text-black mt-2 mb-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Nama</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>: {{ $item->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-grey text-black mt-2 mb-2 ">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Tipe</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>: {{ $item->roomType->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-grey text-black mt-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">

                                            <p class="p-1 mb-0">Penghuni</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>:
                                                {{ $item->user ? $item->user->name : 'Tidak ada' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-grey text-black mt-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Status</p>
                                        </div>
                                        <div class="expand-button col-span-4 flex flex-col justify-center">
                                            <p>: Status pembayran</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border border-grey text-black mt-2">
                                    <div class="grid grid-cols-7 pl-2">
                                        <div class="col-span-3 rounded-lg">
                                            <p class="p-1 mb-0">Tenggat Pembayaran</p>
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
                    @endforeach

                </div>
            </div>
        </div>
    @endforeach

</div>
