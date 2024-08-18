<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Makos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @trixassets
    @livewireStyles

    <style>
        .trix-button--icon-link,
        .trix-button--icon-heading-1,
        .trix-button--icon-code,
        .trix-button--icon-attach,
        .trix-button--icon-decrease-nesting-level,
        .trix-button--icon-increase-nesting-level {
            display: none;
        }
    </style>

    <style>
        ul {
            list-style-type: disc;
            margin-left: 20px;
            padding-left: 20px;
        }

        ol {
            list-style-type: decimal;
            margin-left: 20px;
            padding-left: 20px;
        }

        li {
            margin-bottom: 0px;
        }
    </style>
</head>

<body class="font-sans antialiased">

    <div class="overflow-x">
        <div class="min-w-[360px]">
            @if (Route::currentRouteName() == 'user.login')
                <div class="mx-auto max-w-2xl">
                    @yield('content')
                </div>
            @else
                <div class="fixed w-full z-50">
                    @include('components.header')
                </div>
                @if (Route::currentRouteName() == 'admin.chat-group' ||
                        Route::currentRouteName() == 'admin.chat' ||
                        Route::currentRouteName() == 'user.chat')
                    <div class="mx-auto min-h-screen">
                    @else
                        <div class="mx-auto max-w-2xl min-h-screen">
                @endif
                <div class="pt-16">
                    <div class="pb-20 m-2 mt-4">
                        @yield('content')
                    </div>
                </div>
        </div>

        @section('bottombar')
            @if (auth() && auth()->user() && auth()->user()->role == 'admin')
                @include('components.bottom-nav-admin')
            @elseif(auth() && auth()->user())
                @include('components.bottom-nav-user')
            @endif
        @show
        @endif
    </div>
    </div>
    @livewireScripts
</body>

</html>
