<div>
    @section('title', $title ?? '')
    <div class="card border border-grey text-black mt-4 mb-4">
        <a href="{{ route('admin.chat', ['name' => 'group']) }}">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3 ">Group</p>
                </div>
            </div>
        </a>
    </div>

    <div class="card border border-grey text-black mt-4 mb-4">
        <a href="{{ route('admin.chat', ['name' => 'admin']) }}">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3 ">Admin Group</p>
                </div>
            </div>
        </a>
    </div>

    @foreach ($chat as $item)
        <div class="card border border-grey text-black mt-4 mb-4">
            <a href="{{ route('admin.chat', ['name' => $item['user']]) }}">
                <div class="grid grid-cols-7 gap-2 p-2">
                    <div class="col-span-6 rounded-lg">
                        <p class="pl-3">{{ $item['user'] }}</p>
                    </div>
                    @if ($item['message'] != null)
                        @if ($item['message']->created_at->isToday())
                            <small
                                class="text-xs flex items-center">{{ $item['message']->created_at->format('H:i') }}</small>
                        @else
                            <small
                                class="text-xs flex items-center">{{ $item['message']->created_at->format('d-m-Y') }}</small>
                        @endif
                    @endif
                </div>
            </a>
        </div>
    @endforeach
