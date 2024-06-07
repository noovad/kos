<div class="mt-4 mb-4 m-2">
    <input wire:model='form.name' type="text" placeholder="Type here"
        class="input input-sm input-bordered w-full mb-2" />
    <input wire:model='form.price' type="number" placeholder="Type here"
        class="input input-sm input-bordered w-full mb-2" />
    <textarea wire:model='form.description' class="textarea textarea-bordered w-full mb-2" placeholder="Bio"></textarea>
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small class="text-error">{{ $error }}</small><br>
            @endforeach
        @endif
    </div>
    <div class="my-4">
        <p>Existing Photo</p>
        <div wire:loading wire:target="deletePhoto">
            Processing delete image...
        </div>

        @if (count($photoMe) > 0)
            <div class="flex justify-center px-2 pt-4 text-black">
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($photoMe as $item)
                        <div class="relative group">
                            <img src="{{ asset('storage/photos/' . $item['url']) }}" alt="Room Type" class="rounded-xl">
        
                            <div wire:click="deletePhoto({{ $item['id'] }})" wire:confirm="Hapus photo"
                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl cursor-pointer">
                                <span class="text-white text-lg font-bold">Delete</span>
                            </div>
                        </div>
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
    <input wire:model='selectedPhoto' type="file" multiple class="file-input file-input-sm file-input-bordered w-full max-w-xs" />
    <div wire:loading wire:target="selectedPhoto">
        Processing image...
    </div>
    @if ($selectedPhoto)
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
    
    {{-- fix position buttom simapn --}}
    <div wire:loading wire:target="update">
        Update Data...
    </div>
    <div class="flex justify-center mt-4">
        <button wire:click="update( {{ $data['id'] }} )"
            class="btn btn-sm bg-blue text-white border-none">Simpan</button>
    </div>
</div>
