<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>App Name - @yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Make Top bar if screen size is not mobile --}}
    <div class="container mx-auto max-w-lg w-full min-h-screen">
        {{-- hide if screen size is not mobile --}}
        @include('user.components.header')

        <div class="pt-16">
            <div class="m-2 pb-20">
                @yield('content')
            </div>
        </div>
    </div>


    @section('bottombar')

        {{-- hide if screen size is not mobile --}}
        @include('admin.components.bottom-nav')
    @show
</body>

</html>