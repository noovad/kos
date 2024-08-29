<div>
    @section('title', $title ?? '')

    <div class="mx-auto text-center max-w-2xl">
        <div x-data="{ selected: 'buat' }" class="w-full">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'buat'" wire:click="$set('display', 'buat')">Buat Tagihan</button>
                    </div>
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'perbarui'" wire:click="$set('display', 'perbarui')">Perbarui
                            Tagihan</button>
                    </div>
                </div>
                <span
                    :class="{
                        'left-1 text-blue font-semibold': selected === 'buat',
                        'left-1/2 -ml-1 text-blue font-semibold': selected === 'perbarui'
                    }"
                    x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute"></span>
            </div>
        </div>
    </div>

    @if ($display == 'buat')
        <label for="User" class="block mt-8 text-sm text-gray-700">Tagihan untuk :</label>
        <select wire:model.lazy='user_selected' id="User"
            class="select select-sm text-xs select-bordered w-full max-w-xs mt-2">
            <option selected>Pilih penghuni</option>

            @foreach ($users as $item)
                <option value="{{ $item->id }}">{{ $item->room->name }} - {{ $item->name }}</option>
            @endforeach
        </select>
        <label for="name" class="block text-sm text-gray-700 mt-2">Kamar :</label>
        <input type="text" id="name" class="input input-sm input-bordered w-full text-sm mt-2"
            @if (trim($user_selected) == '') disabled @endif value="{{ $user->room->name ?? '' }}" disabled />
        <label for="tagihan" class="block text-sm text-gray-700 mt-2">Tagihan:</label>
        <div class="flex">
            <span class="input-sm">Rp</span>
            <input wire:ignore wire:model='price' type="text" id="priceInput"
                class="input input-sm input-bordered w-full mb-2" placeholder="0" oninput="formatRupiah(this)">
        </div>
        <label for="keterangan" class="block text-sm text-gray-700 mt-2">Keterangan :</label>
        <input type="text" id="keterangan" wire:model='description'
            class="input input-sm input-bordered w-full text-sm mt-2" placeholder="Keterangan" />
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
            <button wire:click='create' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
        </div>
    </div>
@else
    <label for="Transaction" class="block mt-8 text-sm text-gray-700">Pilih Tagihan :</label>
    <select wire:model.lazy='transaction_selected' id="Transaction"
        class="select select-sm text-xs select-bordered w-full max-w-xs mt-2">
        <option selected>Pilih tagihan</option>

        @foreach ($expire as $item)
            <option value="{{ $item->id }}">{{ $item->user_name }} - {{ date('m-Y', strtotime($item->period)) }}
            </option>
        @endforeach
    </select>
    <label for="name" class="block text-sm text-gray-700 mt-2">Nama :</label>
    <input type="text" id="name" class="input input-sm input-bordered w-full text-sm mt-2"
        @if (trim($transaction_selected) == '') disabled @endif value="{{ $transaction->user_name ?? '' }}" disabled />
    <label for="kamar" class="block text-sm text-gray-700 mt-2">Kamar :</label>
    <input type="text" id="kamar" class="input input-sm input-bordered w-full text-sm mt-2"
        @if (trim($transaction_selected) == '') disabled @endif value="{{ $transaction->room ?? '' }}" disabled />
    <label for="tagihan" class="block text-sm text-gray-700 mt-2">Tagihan:</label>
    <input type="text" id="tagihan" class="input input-sm input-bordered w-full text-sm mt-2"
        @if (trim($transaction_selected) == '' || is_null($transaction)) disabled @endif
        value="Rp. {{ number_format(optional($transaction)->amount, 0, ',', '.') ?? '' }}" disabled />
    <label for="keterangan1" class="block text-sm text-gray-700 mt-2">Keterangan:</label>
    <input type="text" id="keterangan1" class="input input-sm input-bordered w-full text-sm mt-2"
        @if (trim($transaction_selected) == '') disabled @endif value="{{ $transaction->description ?? '' }}" disabled />
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
        <button wire:click='updateTransaction'
            class="btn btn-sm bg-blue text-white border-none">Perbarui</button>
    </div>
</div>
@endif

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
