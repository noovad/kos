<div>
    <div class="mt-4 mb-4">
        <button class="btn btn-xs bg-blue text-white border-none" onclick="modalCreate.showModal()">+ Buat
            Tagihan</button>
    </div>

    {{-- Modal Create --}}
    <dialog wire:ignore.self id="modalCreate" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg text-center text-blue">Buat Tagihan</h3>

            <label for="User" class="block mt-4 text-xs text-gray-700">Tagihan untuk:</label>
            <select wire:model="form.user_id" wire:model.lazy='user_selected' id="User"
                class="select select-sm text-xs select-bordered w-full max-w-xs mt-1">
                <option selected>Pilih penghuni</option>

                @foreach ($users as $itemType)
                    <option value="{{ $itemType->id }}">{{ $itemType->name }}</option>
                @endforeach
            </select>

            <label for="name" class="block text-xs text-gray-700 mt-1">Kamar:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
                @if (trim($user_selected) == '') disabled @endif value="{{ $user->room->name ?? '' }}" disabled />
            <label for="name" class="block text-xs text-gray-700 mt-1">Tagihan:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
                @if (trim($user_selected) == '') disabled @endif value="{{ number_format($user->room->roomType->price ?? 0, 0, ',', '.') }}" disabled />
            <label for="name" class="block text-xs text-gray-700 mt-1">Tenggat Pembayaran:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
                @if (trim($user_selected) == '') disabled @endif value="{{ $user->start_date ?? '' }}" disabled />
            <label for="name" class="block text-xs text-gray-700 mt-1">Status:</label>
            <input type="text" id="name" class="input input-sm input-bordered w-full text-xs mt-1"
                value="Menunggu Pembayaran" disabled />


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
                <button wire:click='create' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
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
