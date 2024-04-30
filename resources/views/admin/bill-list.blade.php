@extends('admin.layouts.app')

@section('title', 'Keuangan')
@section('judul', 'Keuangan')

@section('content')
    <div class="m-2">

        @for ($i = 1; $i <= 20; $i++)
            <div class="card border border-grey text-black mt-4 mb-4">
                <div class="grid grid-cols-7 gap-2 p-2">
                    <div class="col-span-6  rounded-lg">
                        <p class="pl-3 -mb-2">% penghuni bayar</p>
                    </div>
                    <div class="col-span-1 flex flex-col justify-center">
                        <button class="btn btn-xs bg-blue text-white border-none"
                            onclick="modal_detail.showModal()">Detail</button>
                    </div>
                </div>
            </div>
        @endfor
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
