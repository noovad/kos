<div class="mt-8">
    @section('title', $title ?? '')
    <label for="" class="text-sm my-2">Nama Kamar :</label>
    <input wire:model="form.name" type="text" placeholder="Nama Tipe Kamar"
        class="input input-sm input-bordered w-full mb-4" />
    <label for="" class="text-sm my-2 mb-4">Harga :</label>
    <div class="flex">
        <span class="input-sm">Rp</span>
        <input wire:ignore wire:model='formattedValue' type="text" id="priceInput"
            class="input input-sm input-bordered w-full mb-4" placeholder="0" oninput="formatRupiah(this)">
    </div>
    <label for="" class="text-sm mb-2">Deskripsi Kamar :</label>
    <trix-editor wire:model='form.description'
        class="textarea textarea-bordered w-full mb-4 max-h-[calc(75vh)] overflow-y-auto"
        placeholder="Deskripsi"></trix-editor>
    <input wire:model='photo' type="file" accept="image/jpeg, image/png, image/jpg" multiple
        class="file-input file-input-sm file-input-bordered w-full max-w-xs mt-2" />
    <br><small class="text-green-500">*Ukuran maksimal 2MB (jpeg, png, jpg).</small>


    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small class="text-error">{{ $error }}</small><br>
            @break
        @endforeach
    @endif
</div>

<div>
    <div class="flex justify-center mt-4">
        <button wire:click='store' wire:loading.attr='disabled' wire:target='photo'
            class="btn btn-sm bg-blue text-white border-none">Simpan</button>
    </div>

    @if ($photo)
        <small>Pratinjau gambar yang dipilih</small>
        <div class="flex justify-center px-2 pt-4 text-black">
            <div class="grid grid-cols-4 gap-2">
                @foreach ($photo as $item)
                    <div class="relative group">
                        <img src="{{ $item->temporaryUrl() }}" class="rounded-xl" />
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

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
