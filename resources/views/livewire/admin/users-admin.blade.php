<div>
    <div>

        @section('title', $title ?? '')

        <div class="flex justify-end">
            @include('components.search-bar')
        </div>
        <hr class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $item)
                    <tr class="hover">
                        <th>{{ $starting_number + $key }}</th>
                        <td>{{ $item->name }}
                            <br>
                            <small>{{ $item->room->name ?? '' }}</small>
                        </td>
                        <td>
                            <div class="flex justify-center">
                                <button class="btn btn-xs bg-blue" wire:click='openUpdate({{ $item->id }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" color="white" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>
                                <button class="btn btn-xs bg-red-600 mx-2"
                                    onclick="document.getElementById('modalDelete{{ $item->id }}').showModal()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" color="white"
                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

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

                    {{-- -- Modal Update-- --}}
                    <dialog wire:ignore.self id="modalUpdate" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg text-center text-blue">
                                Perbarui Data Pengguna
                            </h3>

                            <label for="name" class="block mb-2 text-xs">Nama</label>
                            <input wire:model='name' type="text" id="name" placeholder="Nama"
                                class="input input-sm input-bordered w-full mb-2" />

                            <label for="room_id" class="block mb-2 text-xs">
                                <input wire:model.lazy="update_password" type="checkbox" id="checklist" class="mr-2">
                                Perbarui Password</label>

                            <div class=@if (trim($update_password) === '') "hidden" @endif>
                                <label for="password" class="block mb-2 text-xs">Password</label>
                                <input wire:model='password' type="password" id="password" placeholder="Password"
                                    class="input input-sm input-bordered w-full mb-2" />

                                <label for="password_confirmation" class="block mb-2 text-xs">Password
                                    Confirmation</label>
                                <input wire:model='password_confirmation' type="password" id="password_confirmation"
                                    placeholder="Password Confirmation"
                                    class="input input-sm input-bordered w-full mb-2" />
                            </div>


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
                                <button wire:click='update({{ $item->id }})'
                                    class="btn btn-xs bg-blue text-white border-none">Perbarui</button>
                                <button class="btn btn-xs bg-blue text-white border-none"
                                    onclick="document.getElementById('modalUpdate').close()">Batal</button>
                            </div>
                        </div>
                </dialog>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-between items-center pt-2">
        <div>
            <select wire:model.lazy="pagination" class="select select-sm text-xs border-black-500">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="75">75</option>
            </select>
        </div>
        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>
<script>
    window.addEventListener('open-modal', event => {
        document.getElementById('modalUpdate').showModal();
    })
    window.addEventListener('close-modal', event => {
        document.getElementById('modalUpdate').close();
    })
</script>
</div>
