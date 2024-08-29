<div>
    @section('title', $title ?? '')

    <div class="mx-auto text-center">
        <div x-data="{ selected: 'kamar' }" class="w-full my-4">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <a @click="selected = 'kamar'" href="{{ route('admin.room-index') }}">Kamar</a>
                    </div>
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <a @click="selected = 'tipe kamar'" href="{{ route('admin.room-type-index') }}">Tipe Kamar</a>
                    </div>
                </div>
                <span :class="{
                    'left-1 text-blue font-semibold': selected === 'kamar',
                    'left-1/2 -ml-1 text-blue font-semibold': selected === 'tipe kamar'
                }"
                    x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute"></span>
            </div>
        </div>
    </div>
    <livewire:admin.room-post>
        <hr>
        <div class="mt-4 mb-4">
            <!-- Filter options -->
            <div class="flex flex-row items-center justify-start">
                <!-- type -->
                <div class="mr-2">
                    <select wire:model.lazy="filter" class="select select-sm text-xs bg-blue text-white border-none">
                        <option selected value="">Semua tipe kamar</option>
                        @foreach ($tipe as $itemType)
                        <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                        @endforeach
                    </select>
                </div>
        
                <!-- status -->
                <div class="mr-2">
                    <select wire:model.lazy="empty" class="select select-sm text-xs bg-blue text-white border-none">
                        <option selected value="">Semua status</option>
                        <option value="1">Terisi</option>
                        <option value="0">Kosong</option>
                    </select>
                </div>
            </div>
        
            <!-- Search bar in a new line -->
            <div class="flex justify-end mt-4">
                @include('components.search-bar')
            </div>
        </div>
        
        @foreach ($data as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-11 gap-2 p-2">
                <div class="col-span-5 rounded-lg">
                    <p class="pl-3 -mb-2">{{ $item->name }}</p>
                    @if (!$item->user)
                    <small class="text-red-500 pl-3">Tidak Terisi</small>
                    @else
                    <small class="text-green-500 pl-3">Terisi</small>
                    @endif
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        wire:click='update({{ $item->id }})'> <svg xmlns="http://www.w3.org/2000/svg"
                            color="white" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg></button>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-red-500 text-white border-none"
                        onclick="document.getElementById('modalDelete{{ $item->id }}').showModal()"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="white"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg></button>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        onclick="document.getElementById('modalDetail{{ $item->id }}').showModal()"> <svg
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
            <div class="modal-box">
                <h3 class="font-bold text-lg text-center text-blue">Detail Kamar</h3>

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
                            <p>: {{ $item->roomType->name ?? '' }} </p>
                        </div>
                    </div>
                </div>
                <div class="card border border-grey text-black mt-2">
                    <div class="grid grid-cols-7 pl-2">
                        <div class="col-span-3 rounded-lg">
                            <p class="p-1 mb-0">Penghuni</p>
                        </div>
                        <div class="expand-button col-span-4 flex flex-col justify-center">
                            @if (!$item->user)
                            <p>: Tidak ada</p>
                            @else
                            <p>: {{ $item->user->name }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-action pt-4 m-0">
                    <a class="btn btn-sm bg-blue text-white border-none"
                        href="{{ route('user.room-detail', str_replace(' ', '_', $item->roomType->name)) }}">Detail Tipe
                        Kamar</a>
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
                {{ $data->links() }}
            </div>
        </div>
</div>