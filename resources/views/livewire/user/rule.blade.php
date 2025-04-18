<div>
    @section('title', $title ?? '')

    <div class="md:mx-40 mx-14">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-marked text-blue">
            <path d="M10 2v8l3-3 3 3V2" />
            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
        </svg>
    </div>
    <div class="mt-8">
        <h3 class="text-blue text-center text-2xl font-bold">Aturan Kos</h3>
    </div>
    <div class="p-8">
        {!! $data->value !!}
    </div>
</div>
