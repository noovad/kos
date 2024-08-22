<div>
    @section('title', $title ?? '')
    <div class="mx-auto text-center fixed top-0 left-0 right-0 mt-20 max-w-2xl z-50">
        <div x-data="{ selected: null }" class="w-full">
            <div class="relative w-full rounded-md border h-10 p-1 bg-gray-200">
                <div class="relative w-full h-full flex items-center">
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'group'" wire:click='update("group")'>Grup
                            @if ($group_indicator == 1)
                            <span class="ms-2 indicator-item badge bg-blue"></span>
                        @endif
                        </button>
                    </div>
                    <div class="w-1/2 flex justify-center text-gray-400 cursor-pointer">
                        <button @click="selected = 'admin'"  wire:click='update("admin")'>Admin
                            @if ($is_read_chat == 0)
                            <span class="ms-2 indicator-item badge bg-blue"></span>
                        @endif
                        </button>
                    </div>
                </div>
                <span
                    :class="{
                        'left-1 text-blue font-semibold': selected === 'group',
                        'left-1/2 -ml-1 text-blue font-semibold': selected === 'admin',
                        'hidden': !selected
                    }"
                    x-text="selected ? selected.charAt(0).toUpperCase() + selected.slice(1) : ''"
                    class="bg-white shadow text-sm flex items-center justify-center w-1/2 rounded h-[1.88rem] transition-all duration-150 ease-linear top-[4px] absolute">
                </span>
            </div>
        </div>
    </div>

    <div class="mt-16">
        @if ($display == 'admin')
            @include('components.chat', ['title' => $title, 'chat' => $chat])
        @elseif ($display == 'group')
            @include('components.chat', ['title' => $title, 'chat' => $group])
        @else
            <div class="mt-20 text-center">
                <small class="text-blue font-bold">
                    Pilih Obrolan
                </small>
            </div>
        @endif
    </div>

</div>
