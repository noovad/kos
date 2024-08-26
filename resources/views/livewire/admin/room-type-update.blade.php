<div class="mt-8">
    @section('title', $title ?? '')
    <label for="" class="text-sm my-2">Nama Kamar :</label>
    <input wire:model='form.name' type="text" placeholder="Type here"
        class="input input-sm input-bordered w-full mb-4" />
    <label for="" class="text-sm my-2 mb-4">Harga :</label>
    <div class="flex">
        <span class="input-sm">Rp</span>
        <input wire:model='formattedValue' type="text" id="priceInput" class="input input-sm input-bordered w-full mb-8"
            placeholder="0" oninput="formatRupiah(this)">
    </div>
    <label for="" class="text-sm mb-2">Deskripsi Kamar :</label>
    <trix-editor wire:model='form.description' class="textarea textarea-bordered w-full max-h-[calc(75vh)] overflow-y-auto" ></trix-editor>
    <div class="my-4">
        <p>Daftar photo</p>

        @if (count($photoMe) > 0)
        <div class="flex justify-center px-2 pt-4 text-black">
            <div class="grid grid-cols-4 gap-2">
                @foreach ($photoMe as $item)
                <div class="relative group">
                    <img src="{{ asset('storage/photos/' . $item['url']) }}" alt="Room Type" class="rounded-xl">

                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl cursor-pointer">
                        <span class="text-white text-lg font-bold"
                            onclick="document.getElementById('deleteModal').showModal()">Delete</span>
                    </div>
                </div>

                <dialog id="deleteModal" class="modal">
                    <div class="modal-box">
                        <p class="text-center">Hapus photo???</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn btn-xs bg-blue text-white border-none"
                                    wire:click="deletePhoto({{ $item['id'] }})">Hapus</button>
                                <button class="btn btn-xs bg-blue text-white border-none">Batal</button>
                            </form>
                        </div>
                    </div>
                </dialog>
                @endforeach
            </div>
        </div>
        @else
        <div class="flex justify-center">
            <small class="text-center">No photo</small>
        </div>
        @endif
        <hr class="m-2">
    </div>
    <input wire:model='selectedPhoto' type="file" accept="image/jpeg, image/png, image/jpg" multiple
        class="file-input file-input-sm file-input-bordered w-full max-w-xs" />
    <br><small class="text-green-500">*Ukuran maksimal 2MB (jpeg, png, jpg).</small>
    <div>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <small class="text-error">{{ $error }}</small><br>
        @endforeach
        @endif
    </div>

    <div class="flex justify-center mt-4">
        <button wire:click="update( {{ $data['id'] }} )"
            class="btn btn-sm bg-blue text-white border-none mb-2">Simpan</button>
    </div>

    @if ($selectedPhoto)
    <small>Pratinjau gambar yang dipilih</small>
    <div class="flex justify-center px-2 pt-4 text-black">
        <div class="grid grid-cols-4 gap-2">
            @foreach ($selectedPhoto as $item)
            <div class="relative group">
                <img src="{{ $item->temporaryUrl() }}" class="rounded-xl" />
            </div>
            @endforeach
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