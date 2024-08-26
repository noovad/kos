@if (Route::currentRouteName() == 'user.chat' || Route::currentRouteName() == 'livewire.update')
    <div class="px-2 pt-1 flex flex-col-reverse h-[calc(100vh-260px)] lg:h-[calc(100vh-215px)] overflow-y-auto">
    @else
        <div class="px-2 pt-1 flex flex-col-reverse h-[calc(100vh-215px)] lg:h-[calc(100vh-170px)] overflow-y-auto">
@endif

<div class="max-w-2xl mx-auto min-w-[500px]">
    @foreach ($chat as $date => $dayMessages)
        <!-- Display date header -->
        <div class="date-header text-center text-gray-500">
            <small>{{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}</small>
        </div>

        @foreach ($dayMessages as $item)
            @if ($item->sender_id == auth()->id())
                <!-- Message from the current user -->
                <div class="chat chat-end">
                    <div class="chat-header">
                        <small>Me</small>
                        <small class="opacity-50">{{ $item->created_at->format('H:i') }}</small>
                    </div>
                    <div class="chat-bubble bg-blue">
                        <p class="text">{{ $item->message }}</p>
                    </div>
                </div>
            @elseif ($item->sender_id == ($user ?? ''))
                <!-- Message from the specific user -->
                <div class="chat chat-start">
                    <div class="chat-header">
                        <small>{{ $item->sender->name }}</small>
                        <small class="opacity-50">{{ $item->created_at->format('H:i') }}</small>
                    </div>
                    <div class="chat-bubble bg-gray-500">
                        <p class="text">{{ $item->message }}</p>
                    </div>
                </div>
            @else
                <!-- Message from another user -->
                <div class="chat chat-start">
                    <div class="chat-header">
                        @if (Auth::user()->role == 'user')
                            <small>Admin</small>
                        @else
                            <small>{{ $item->sender->name ?? ""}}</small>
                        @endif
                        <small class="opacity-50">{{ $item->created_at->format('H:i') }}</small>
                    </div>
                    <div class="chat-bubble">
                        <p class="text">{{ $item->message }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach

</div>
</div>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <small class="text-error">{{ $error }}</small><br>
    @endforeach
@endif

<div
    class="mx-auto text-center lg:bg-white lg:drop-shadow-up bg-base fixed bottom-16 left-0 right-0 max-full py-4 px-4 z-50 lg:bottom-0 lg:bottom">
    <div class="flex justify-between max-w-2xl mx-auto lg:px-20">
        <input wire:model='message' id="myInput" placeholder="Masukan Pesan" type="text"
            class="input input-bordered border-blue w-full" />
        <button wire:click='sendMessage' id="myButton" class="btn ms-4 btn-outline bg-blue text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-send-fill" viewBox="0 0 16 16">
                <path
                    d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
            </svg>
        </button>
    </div>
</div>
