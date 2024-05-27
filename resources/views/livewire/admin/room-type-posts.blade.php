<div class="mt-4 mb-4 m-2">
    <input wire:model="form.name" type="text" placeholder="Type here"
        class="input input-sm input-bordered w-full mb-2" />
    <input wire:model='form.price' type="number" placeholder="Type here"
        class="input input-sm input-bordered w-full mb-2" />
    <textarea wire:model='form.description' class="textarea textarea-bordered w-full mb-2" placeholder="Bio"></textarea>
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
<div wire:loading wire:target="photo">
    Processing image...
</div>
<div>


    @if ($photo)
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


<div class="flex justify-center mt-4">
    <button wire:click='store' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
</div>

</div>
