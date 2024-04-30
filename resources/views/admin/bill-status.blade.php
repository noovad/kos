@extends('admin.layouts.app')

@section('title', 'Keuangan')
@section('judul', 'Status Pembayaran')

@section('content')
    <div class="m-2 border">
        <div class="m-2 mb-0 p-2 rounded-md bg-blue text-white text-center">
            <span class="text-lg font-bold">Type 2</span>
        </div>
        <div class="flex justify-center py-5 text-black">
            <div class="grid grid-cols-4 gap-3">
                @for ($i = 2; $i <= 10; $i++)
                    <div class="size-16 rounded-md bg-blue text-white flex justify-center items-center"
                        onclick="modal_detail.showModal()">
                        <span class="text-2xl font-bold">{{ $i }}</span>
                    </div>
                @endfor

            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <dialog id="modal_detail" class="modal">
        <div class="modal-box w-5/12 max-w-5xl">
            <h3 class="font-bold text-lg text-center text-blue">Nama Kamar</h3>

            <div class="card border border-grey text-black mt-2 mb-2">
                <div class="grid grid-cols-7 pl-2">
                    <div class="col-span-3 rounded-lg">
                        <p class="p-1 mb-0">Nama</p>
                    </div>
                    <div class="expand-button col-span-4 flex flex-col justify-center">
                        <p>: Satu</p>
                    </div>
                </div>
            </div>
            <div class="card border border-grey text-black mt-2 mb-2 ">
                <div class="grid grid-cols-7 pl-2">
                    <div class="col-span-3 rounded-lg">
                        <p class="p-1 mb-0">Tipe</p>
                    </div>
                    <div class="expand-button col-span-4 flex flex-col justify-center">
                        <p>: Satu</p>
                    </div>
                </div>
            </div>
            <div class="card border border-grey text-black mt-2">
                <div class="grid grid-cols-7 pl-2">
                    <div class="col-span-3 rounded-lg">
                        <p class="p-1 mb-0">Penghuni</p>
                    </div>
                    <div class="expand-button col-span-4 flex flex-col justify-center">
                        <p>: Satu</p>
                    </div>
                </div>
            </div>
            <div class="card border border-grey text-black mt-2">
                <div class="grid grid-cols-7 pl-2">
                    <div class="col-span-3 rounded-lg">
                        <p class="p-1 mb-0">Status</p>
                    </div>
                    <div class="expand-button col-span-4 flex flex-col justify-center">
                        <p>: Satu</p>
                    </div>
                </div>
            </div>
            {{-- // jika sudah dibayar, maka tidak muncul --}}
            <div class="card border border-grey text-black mt-2">
                <div class="grid grid-cols-7 pl-2">
                    <div class="col-span-3 rounded-lg">
                        <p class="p-1 mb-0">Tenggat Pembayaran</p>
                    </div>
                    <div class="expand-button col-span-4 flex flex-col justify-center">
                        <p>: Satu</p>
                    </div>
                </div>
            </div>

            <div class="modal-action pt-4 m-0">
                <form method="dialog">
                    <button class="btn btn-sm bg-blue text-white border-none">Close</button>
                </form>
            </div>
        </div>
    </dialog>
@endsection
