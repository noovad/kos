<div class="mt-4 mb-4 m-2">
    <div wire:loading>
        Saving post...
    </div>
    <input wire:model="data.name" type="text" placeholder="Type here" class="input input-sm input-bordered w-full mb-2" value="{{ $data['name'] }}"/>

    <input wire:model='data.price' type="int" placeholder="Type here" class="input input-sm input-bordered w-full mb-2" value="{{ $data['price']}}"/>

    <textarea wire:model='data.description' class="textarea textarea-bordered w-full mb-2" placeholder="Bio"> {{ $data['description']}} </textarea>

    <input type="file" class="file-input file-input-sm file-input-bordered w-full max-w-xs" />

    <div class="flex justify-center px-2 pt-4 text-black">
        <div class="grid grid-cols-5 gap-2">
            @for ($i = 0; $i < 7; $i++)
                <div class="relative group">
                    <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                        class="rounded-xl" />
                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl">
                        <span class="text-white text-lg font-bold">Delete</span>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="flex justify-center">
                <button wire:click='update({{ $data['id']}} )' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
    </div>
    
</div>