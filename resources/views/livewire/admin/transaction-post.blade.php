<div>
    @section('title', $title ?? '')

    <label for="User" class="block mt-8 text-sm text-gray-700">Tagihan untuk :</label>
    <select wire:model="user_id" wire:model.lazy='user_selected' id="User"
        class="select select-md text-sm select-bordered w-full max-w-xs mt-2">
        <option selected>Pilih penghuni</option>

        @foreach ($users as $item)
            <option value="{{ $item->id }}">{{ $item->room->name }} - {{ $item->name }}</option>
        @endforeach
    </select>
    <label for="name" class="block text-sm text-gray-700 mt-2">Kamar :</label>
    <input type="text" id="name" class="input input-md input-bordered w-full text-sm mt-2"
        @if (trim($user_selected) == '') disabled @endif value="{{ $user->room->name ?? '' }}" disabled />
    <label for="name" class="block text-sm text-gray-700 mt-2">Tagihan:</label>
    <div class="flex">
        <span class="input-md">Rp</span>
        <input wire:ignore wire:model='price' type="text" id="priceInput"
            class="input input-md input-bordered w-full mb-2" placeholder="0" oninput="formatRupiah(this)">
    </div>
    <label for="name" class="block text-sm text-gray-700 mt-2">Keterangan :</label>
    <input type="text" id="name"  wire:model='description' class="input input-md input-bordered w-full text-sm mt-2"
        placeholder="Keterangan" />
    <small class="text-green-500">*Tagihan akan kedaluarsa dalam 7 hari.</small>
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
        <button wire:click='create' class="btn btn-md bg-blue text-white border-none">Simpan</button>
    </div>
</div>

<script>
    window.addEventListener('open-modal-create', event => {
        document.getElementById('modalCreate').showModal();
    })
</script>

<script>
    function formatRupiah(input) {
        let value = input.value.replace(/[^,\d]/g, '');

        const parts = value.split(',');

        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        input.value = parts.join(',');
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const input = document.getElementById('priceInput');
        formatRupiah(input);
    });
</script>
</div>
