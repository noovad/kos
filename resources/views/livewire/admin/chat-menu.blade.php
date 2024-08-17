<div>
    @section('title', $title ?? '')
    <div class="card border border-grey text-black mt-4 mb-4">
        <a href="{{ route('admin.chat-group') }}">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3 ">Group</p>
                </div>
                <small class="text-xs flex items-center">27-03-2024</small>
            </div>
        </a>
    </div>

    @foreach ($chat as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            @if ($item->receiver->id == auth()->id())
                <a href="{{ route('admin.chat', ['name' => $item->sender->name]) }}">
                @else
                    <a href="{{ route('admin.chat', ['name' => $item->receiver->name]) }}">
            @endif
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3">
                        @if ($item->receiver->id == auth()->id())
                            {{ $item->sender->name }}
                        @else
                            {{ $item->receiver->name }}
                        @endif
                    </p>
                </div>
                <small class="text-xs flex items-center">{{ $item->created_at->format('d-m-Y') }}</small>
            </div>
            </a>
        </div>
    @endforeach
