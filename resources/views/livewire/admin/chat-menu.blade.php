<div>
    @section('title', $title ?? '')
    <div class="card border border-grey text-black mt-4 mb-4">
        <a href="{{ route('admin.chat', ['name' => 'group']) }}">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3">Group</p>
                </div>
                @if ($lastGroupMessage)
                    <small class="text-xs flex items-center">
                        {{ $lastGroupMessage->created_at->isToday() 
                            ? $lastGroupMessage->created_at->format('H:i') 
                            : $lastGroupMessage->created_at->format('d-m-Y') 
                        }}
                        @if ($groupIndicator)
                            <span class="ms-2 indicator-item badge bg-blue"></span>
                        @endif
                    </small>
                @endif
            </div>
        </a>
    </div>
    
    <div class="card border border-grey text-black mt-4 mb-4">
        <a href="{{ route('admin.chat', ['name' => 'admin']) }}">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3">Admin Group</p>
                </div>
                @if ($lastAdminMessage)
                    <small class="text-xs flex items-center">
                        {{ $lastAdminMessage->created_at->isToday() 
                            ? $lastAdminMessage->created_at->format('H:i') 
                            : $lastAdminMessage->created_at->format('d-m-Y') 
                        }}
                        @if ($adminIndicator)
                            <span class="ms-2 indicator-item badge bg-blue"></span>
                        @endif
                    </small>
                @endif
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
                    @if ($item['message'])
                        <small class="text-xs flex items-center">
                            {{ $item['message']->created_at->isToday() 
                                ? $item['message']->created_at->format('H:i') 
                                : $item['message']->created_at->format('d-m-Y') 
                            }}
                            @if (!$item['is_read'])
                                <span class="ms-2 indicator-item badge bg-blue"></span>
                            @endif
                        </small>
                    @endif
                </div>
            </a>
        </div>
    @endforeach
    
