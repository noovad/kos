<div>
    <div class="w-full max-w-sm flex flex-col mx-auto text-center">
        <div x-data="{ selected: 'kamar' }" class="w-full my-4">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'kamar'" wire:click="$set('page', 'kamar')">Kamar</button>
                    </div>
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'tipe kamar'" wire:click="$set('page', 'tipe kamar')">Tipe Kamar</button>
                    </div>
                </div>
                <span :class="{
                    'left-1 text-blue font-semibold': selected === 'kamar',
                    'left-1/2 -ml-1 text-blue font-semibold': selected === 'tipe kamar'
                }"
                    x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute"></span>
            </div>
        </div>
    </div>

    @if ($page == 'tipe kamar')
    @livewire('admin.room-type-index')
    @else
    @livewire('admin.room-index')
    @endif

</div>