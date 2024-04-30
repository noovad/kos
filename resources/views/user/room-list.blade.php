@extends('user.layouts.app')


@section('judul', 'Room')

@section('content')

    <div class="px-2 mt-4 mb-20">
        @for ($i = 0; $i < 20; $i++)
            <div class="card border border-grey text-black mb-4">
                <div class="grid grid-cols-7 gap-2 p-2">
                    <div class="col-span-3  rounded-lg">
                        <p class="pl-3 -mb-2">Nama Kos {{$i}}</p>
                        <small class="pl-3">status</small>
                    </div>
                    <div class="col-span-3 flex flex-col justify-center">
                        <small>Rp 1.000.000</small>
                    </div>
                    <div class="expand-button col-span-1 flex flex-col justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-blue" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </div>
                </div>

                <div class="detail hidden pb-2">
                    <hr class="mx-4 mb-2">
                    <div class="grid grid-cols-7 gap-2 p-2 pb-0">
                        <div class="col-span-6 rounded-lg">
                            <p class="pl-3">Fasilitas :</p>
                            <p class="pl-3">Fasilitas 1</p>
                            <p class="pl-3">Fasilitas 1</p>
                            <p class="pl-3">Fasilitas 1</p>
                        </div>
                        <div class="col-span-1 rounded-lg flex flex-col justify-end">
                            <a href="/room-detail" class="btn btn-xs bg-blue border-none text-white">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.expand-button');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const fasilitas = button.parentElement.nextElementSibling;
                    fasilitas.classList.toggle('hidden');
                });
            });
        });
    </script>
@endsection
