<div>
    @section('title', $title ?? '')

    {{-- <button wire:click='message' class="bg-blue hover:bg-blue text-white font-bold py-2 px-4 rounded">Click Me</button> --}}
    <div class="mx-auto text-center fixed top-0 left-0 right-0 mt-20 max-w-2xl z-50">
        <div x-data="{ selected: 'group' }" class="w-full">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'group'" wire:click="$set('display', 'kamar')">Grup</button>
                    </div>
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'admin'" wire:click="$set('display', 'tipe kamar')">Admin</button>
                    </div>
                </div>
                <span
                    :class="{
                        'left-1 text-blue font-semibold': selected === 'group',
                        'left-1/2 -ml-1 text-blue font-semibold': selected === 'admin'
                    }"
                    x-text="selected.charAt(0).toUpperCase() + selected.slice(1)"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute"></span>
            </div>
        </div>
    </div>


    <div class="px-2 pt-16">
        @for ($i = 0; $i < 10; $i++)
            <div class="chat chat-end">
                <div class="chat-header">
                    <small>Me</small>
                </div>
                <div class="chat-bubble">
                    <p>You were the Chose One!</p>
                    <small class="opacity-50">12:45</small>
                </div>
            </div>
        @endfor
        <div id="endOfChat"></div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('endOfChat').scrollIntoView();
        };
    </script>
</div>
