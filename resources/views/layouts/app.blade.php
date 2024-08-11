<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Makos -  {{$title ?? ''}}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="container mx-auto max-w-lg w-full min-h-screen">
        @include('components.header')

        <div class="pt-16">
            <div class="pb-20">
                @yield('content')
            </div>
        </div>
    </div>

    @section('bottombar')

    @include('components.bottom-nav')
    <!-- @include('user.components.bottom-nav') -->

    @show
    @livewireScripts
</body>
</html>