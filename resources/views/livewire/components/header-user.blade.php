<div>
    <a href="{{ route('user.home') }}" class="m-2 font-semibold">
        <small>Home</small>
    </a>
    @if ($indicator == 'danger')
        <div class="indicator">
            <span class="indicator-item badge badge-xs bg-red-500 border-red-500"></span>
            <a href="{{ route('user.transaction-index') }}" class="mx-2 font-semibold">
                <small>Tagihan</small>
            </a>
        </div>
    @elseif ($indicator == 'warning')
        <div class="indicator">
            <span class="indicator-item badge badge-xs bg-yellow-500 border-yellow-500"></span>
            <a href="{{ route('user.transaction-index') }}" class="mx-2 font-semibold">
                <small>Tagihan</small>
            </a>
        </div>
    @elseif ($indicator == 'success')
        <a href="{{ route('user.transaction-index') }}" class="mx-2 font-semibold">
            <small>Tagihan</small>
        </a>
    @endif
    <a href="{{ route('user.chat') }}" class="m-2 font-semibold">
        <small>Chat</small>
    </a>
    <a href="{{ route('user.profile') }}" class="m-2 font-semibold">
        <small>Profil</small>
    </a>
</div>
