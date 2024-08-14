<div>
    @section('title', $title ?? '')
    <div class="card border border-grey text-black mt-4 mb-4">
        <a href="{{ route('admin.chat-content', ['id' => '4']) }}">
            <div class="grid grid-cols-7 gap-2 p-2">
                <div class="col-span-6 rounded-lg">
                    <p class="pl-3 ">Group</p>
                </div>
                <small class="text-xs flex items-center">27-03-2024</small>
            </div>
        </a>
    </div>
</div>
