<!-- Navbar for Large Screens -->
<div class="navbar max-h-16 bg-blue drop-shadow-down text-white hidden lg:flex">
    <div class="navbar-start">
        @if (auth() && auth()->user() && auth()->user()->role == 'admin')
            <a href='{{ route('user.profile') }}' class="m-2 font-semibold">
                <small>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </small>
            </a>
        @endif
    </div>
    <div class="navbar-center hidden lg:flex">
        <p class="btn btn-ghost text-xl">@yield('title')</p>
    </div>
    <div class="navbar-end">
        <div>
            @if (auth() && auth()->user() && auth()->user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}" class="m-2 font-semibold">
                    <small>Dashboard</small>
                </a>
                <a href="{{ route('admin.room-index') }}" class="m-2 font-semibold">
                    <small>Kamar</small>
                </a>
                <a href="{{ route('admin.transaction') }}" class="m-2 font-semibold">
                    <small>Keuangan</small>
                </a>
                <a href="{{ route('admin.chat-menu') }}" class="m-2 font-semibold">
                    <small>Chat</small>
                </a>
                <a href="{{ route('admin.users-index') }}" class="m-2 font-semibold">
                    <small>Pengguna</small>
                </a>
            @elseif (auth() && auth()->user() && auth()->user()->role == 'user')
                <a href="{{ route('user.home') }}" class="m-2 font-semibold">
                    <small>Home</small>
                </a>
                <a href="{{ route('user.transaction-index') }}" class="m-2 font-semibold">
                    <small>Transaksi</small>
                </a>
                <a href="{{ route('user.chat') }}" class="m-2 font-semibold">
                    <small>Chat</small>
                </a>
                <a href="{{ route('user.profile') }}" class="m-2 font-semibold">
                    <small>Profil</small>
                </a>
            @else
                <a href="{{ route('user.login') }}" class="m-2 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                        <path fill-rule="evenodd"
                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </a>
            @endif
        </div>
    </div>
</div>

<!-- Navbar for Small Screens -->
<div class="navbar max-h-16 bg-blue drop-shadow-down text-white justify-center lg:hidden">
    <div class="navbar-start">
        @if (auth() && auth()->user() && auth()->user()->role == 'admin')
            <a href='{{ route('user.profile') }}' class="m-2 font-semibold">
                <small>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </small>
            </a>
        @endif
    </div>
    <div class="navbar-center text-white">
        <p class="btn btn-ghost text-xl">@yield('title')</p>
    </div>
    <div class="navbar-end">
        @guest
            <a href="{{ route('user.login') }}" class="m-2 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                    <path fill-rule="evenodd"
                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
            </a>
        @endguest
    </div>
</div>
