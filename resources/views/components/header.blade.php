<!-- Navbar for Large Screens -->
<div class="navbar max-h-16 bg-blue drop-shadow-down text-white hidden lg:flex">
    <div class="navbar-start">
    </div>
    <div class="navbar-center hidden lg:flex">
        <p class="btn btn-ghost text-xl">@yield('title')</p>
    </div>
    <div class="navbar-end">
        <div>
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
        </div>
    </div>
</div>

<!-- Navbar for Small Screens -->
<div class="navbar max-h-16 bg-blue drop-shadow-down justify-center lg:hidden">
    <div class="text-white text-center">
        <p class="btn btn-ghost text-xl">@yield('title')</p>
    </div>
</div>