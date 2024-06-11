<div>
    <div class="mt-4 mb-4">
        <button class="btn btn-xs bg-blue text-white border-none" onclick="modalCreate.showModal()">+ Tambah
            Pengguna</button>
    </div>

    {{-- Modal Create --}}
    <dialog wire:ignore.self id="modalCreate" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg text-center text-blue">
                @if ($update_data === true)
                    Perbarui Data Pengguna
                @else
                    Tambah Pengguna
                @endif
            </h3>

            <input wire:model='name' type="text" placeholder="Nama" class="input input-bordered w-full mb-2" />
            <input wire:model='email' type="text" placeholder="No Telepon"
                class="input input-bordered w-full mb-2" />
            <input wire:model='password' type="password" placeholder="Password"
                class="input input-bordered w-full mb-2" />
            <input wire:model='password_confirmation' type="password" placeholder="Password Confirmation"
                class="input input-bordered w-full mb-2" />
            <br>

            <select wire:model="room_id" class="select select-bordered w-full max-w-xs mt-4">
                @if ($room_id_update === "")
                    <option selected>Pilih tipe</option>
                @endif
                <option selected value="">Tidak aktif</option>
                @if (($room_id_update || $room_name_update) != "")
                <option value=" {{ $room_id_update }} " selected class="text-green-600"> {{ $room_name_update }} </option>
                
                @endif
                @foreach ($tipe as $itemType)
                    <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                @endforeach
            </select>


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
                @if ($update_data === true)
                    <button wire:click='update()'
                        class="btn btn-sm bg-blue text-white border-none">Perbarui</button>
                @else
                    <button wire:click='register' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
                @endif
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
</script>
</div>
