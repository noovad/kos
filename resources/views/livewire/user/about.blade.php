<div>
    @section('title', $title ?? '')

    <div class="md:mx-40 mx-14">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users text-blue">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
        </svg>
    </div>
    <a href='https://wa.me/{{ $nomor->value }}' class="btn bg-blue text-white">Chat Admin (WA)</a>
    <div class="mt-8">
        <h3 class="text-blue text-center text-2xl font-bold">Tentang Kos</h3>
    </div>
    <div class="p-8">
        {!! $data->value !!}
    </div>
</div>
