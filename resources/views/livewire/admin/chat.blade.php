<div>
    @section('title', $title ?? '')
    @include('components.chat', ['chat' => $chat])
</div>
