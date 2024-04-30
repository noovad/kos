@extends('admin.layouts.app')

@section('judul', 'Buat Tipe Kamar')

@section('content')

    <div class="mt-4 mb-4 m-2">
        <input type="text" placeholder="Type here" class="input input-sm input-bordered w-full mb-2" />

        <input type="text" placeholder="Type here" class="input input-sm input-bordered w-full mb-2" />

        <textarea class="textarea textarea-bordered w-full mb-2" placeholder="Bio"></textarea>

        <input type="file" class="file-input file-input-sm file-input-bordered w-full max-w-xs" />

        <div class="flex justify-center px-2 pt-4 text-black">
            <div class="grid grid-cols-5 gap-2">
                @for ($i = 0; $i < 7; $i++)
                    <div class="relative group">
                        <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                            class="rounded-xl" />
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl">
                            <span class="text-white text-lg font-bold">Delete</span>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="flex justify-start items-start">
            <div class="modal-action mx-4">
                <form>
                    <button class="btn btn-sm bg-blue text-white border-none">Simpan</button>
                </form>
            </div>
            <div class="modal-action mx-4">
                <form method="dialog">
                    <button class="btn btn-sm bg-blue text-white border-none">Batal</button>
                </form>
            </div>
        </div>
        
    </div>
@endsection
