<div>
    <div class="mt-4 mb-4">
        <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type') }}">Tipe Kamar</a>
        <button class="btn btn-xs bg-blue text-white border-none" onclick="modalCreate.showModal()">+ Tambah
            Kamar</button>
    </div>

    {{-- Modal Create --}}
    <dialog wire:ignore.self id="modalCreate" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg text-center text-blue">
                @if ($update_data === true)
                Perbarui Data Kamar
                @else
                Tambah Kamar
                @endif
            </h3>

            <input wire:model='form.name' type="text" placeholder="Type here" class="input input-bordered w-full" />

            <select wire:model="form.room_type_id" class="select select-bordered w-full max-w-xs mt-4">
                @if (!$update_data)
                    <option selected>Pilih tipe</option>
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
                    <button wire:click='create' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
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
