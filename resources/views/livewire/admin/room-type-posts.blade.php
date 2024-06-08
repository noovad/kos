<div class="mt-4 mb-4 m-2">
    
    <input wire:model="form.name" type="text" placeholder="Nama Tipe Kamar"
        class="input input-sm input-bordered w-full mb-2" />
    <div class="flex">
        <span class="input-sm">Rp</span>
        <input wire:model='formattedValue' type="text" id="priceInput" class="input input-sm input-bordered w-full mb-2"
            placeholder="0" oninput="formatRupiah(this)">
    </div>
    <textarea wire:model='form.description' class="textarea textarea-bordered w-full mb-2" placeholder="Deskripsi"></textarea>
    <input wire:model='photo' type="file" multiple
        class="file-input file-input-sm file-input-bordered w-full max-w-xs" />
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
