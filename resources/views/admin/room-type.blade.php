@extends('admin.layouts.app')


@section('judul', 'Room')

@section('content')

    <div class="mt-4 mb-4">
        <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type.create') }}">+Tambah Tipe Kamar</a>
    </div>
    <hr>

    @for ($i = 0; $i < 3; $i++)
        <div class="card border border-grey text-black mt-4 mb-4">
            <div class="grid grid-cols-11 gap-2 p-2">
                <div class="col-span-5 rounded-lg">
                    <p class="pl-3 -mb-2">Bulan {{ $i }}</p>
                    <small class="pl-3">status</small>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type.update') }}">Ubah</a>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <button class="btn btn-xs bg-blue text-white border-none"
                        onclick="modal_delete.showModal()">Hapus</button>
                </div>
                <div class="expand-button col-span-2 flex flex-col justify-center">
                    <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type.detail') }}">Detail</a>

                </div>
            </div>
        </div>
    @endfor


    {{-- Modal Delete --}}
    <dialog id="modal_delete" class="modal">
        <div class="modal-box w-5/12 max-w-5xl">
            <h3 class="font-bold text-lg text-center text-red-500">Hapus data?</h3>

            <div class="flex justify-center items-center">
                <div class="modal-action mx-4">
                    <form>
                        <button class="btn btn-sm bg-red-500 text-white border-none">Hapus</button>
                    </form>
                </div>
                <div class="modal-action mx-4">
                    <form method="dialog">
                        <button class="btn btn-sm bg-blue text-white border-none">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </dialog>
@endsection
