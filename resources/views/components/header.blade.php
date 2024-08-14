<!-- Navbar for Large Screens -->
<div class="navbar max-h-16 bg-blue drop-shadow-down text-white hidden lg:flex">
    <div class="navbar-start">
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
                <a href="{{ route('admin.room') }}" class="m-2 font-semibold">
                    <small>Kamar</small>
                </a>
                <a href="{{ route('admin.transaction') }}" class="m-2 font-semibold">
                    <small>Keuangan</small>
                </a>
                <a href="{{ route('admin.chat') }}" class="m-2 font-semibold">
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
                    <small>Login</small>
                </a>
            @endif
        </div>
    </div>
</div>

<!-- Navbar for Small Screens -->
<div class="navbar max-h-16 bg-blue drop-shadow-down justify-center lg:hidden">
    <div class="text-white text-center">
        <p class="btn btn-ghost text-xl">@yield('title')</p>
    </div>
</div>
