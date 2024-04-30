<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container mx-auto max-w-lg w-full bg-white pb-20">
        <div class="bg-blue pt-2 flex flex-col justify-center rounded-b-large items-center text-white drop-shadow-down">
            <h2 class="text-5xl font-bold">DASHBOARD</h2>
        </div>


        @include('admin.components.bottom-nav')
    </div>
</body>

</html>
