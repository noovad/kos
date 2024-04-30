@extends('admin.layouts.app')


@section('judul', 'Room')

@section('content')

<div class="mt-4 mb-4">
  <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('admin.room-type') }}">Tipe Kamar</a>
  <button class="btn btn-xs bg-blue text-white border-none" onclick="modal_create.showModal()">+ Tambah Kamar</button>
</div>
<hr>

<div class="mt-4 mb-4">
  <details class="dropdown">
    <summary class="btn btn-xs bg-blue text-white border-none">Pilih Tipe</summary>
    <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
      <li><a>Item 1</a></li>
      <li><a>Item 2</a></li>
    </ul>
  </details>
</div>
@for ($i = 0; $i < 3; $i++)
<div class="card border border-grey text-black mt-4 mb-4">
    <div class="grid grid-cols-11 gap-2 p-2">
        <div class="col-span-5 rounded-lg">
            <p class="pl-3 -mb-2">Bulan {{$i}}</p>
            <small class="pl-3">status</small>
        </div>
        <div class="expand-button col-span-2 flex flex-col justify-center">
            <button class="btn btn-xs bg-blue text-white border-none" onclick="modal_update.showModal()">Ubah</button>
        </div>
        <div class="expand-button col-span-2 flex flex-col justify-center">
          <button class="btn btn-xs bg-blue text-white border-none" onclick="modal_delete.showModal()">Hapus</button>
        </div>
        <div class="expand-button col-span-2 flex flex-col justify-center">
          <button class="btn btn-xs bg-blue text-white border-none" onclick="modal_detail.showModal()">Detail</button>
        </div>
    </div>
</div>
@endfor

{{-- Modal Detail --}}
<dialog id="modal_detail" class="modal">
  <div class="modal-box w-5/12 max-w-5xl">
    <h3 class="font-bold text-lg text-center text-blue">Detail Kamar</h3>
    
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

    <div class="modal-action pt-4 m-0">
      <form method="dialog">
        <button class="btn btn-sm bg-blue text-white border-none">Close</button>
      </form>
    </div>
  </div>
</dialog>

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

{{-- Modal Update --}}
<dialog id="modal_update" class="modal">
  <div class="modal-box w-5/12 max-w-5xl">
    <h3 class="font-bold text-lg text-center text-blue">Ubah Kamar</h3>
    
    <input type="text" placeholder="Type here" class="input input-sm input-bordered w-full" />

    <select class="select select-sm select-bordered w-full max-w-xs mt-4">
      <option disabled selected>Tipe Kamar</option>
      <option>Han Solo</option>
      <option>Greedo</option>
    </select>

    <div class="flex justify-center items-center">
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
</dialog>

{{-- Modal Create --}}
<dialog id="modal_create" class="modal">
  <div class="modal-box w-5/12 max-w-5xl">
    <h3 class="font-bold text-lg text-center text-blue">Tambah Kamar</h3>
    
    <input type="text" placeholder="Type here" class="input input-sm input-bordered w-full" />

    <select class="select select-sm select-bordered w-full max-w-xs mt-4">
      <option disabled selected>Tipe Kamar</option>
      <option>Han Solo</option>
      <option>Greedo</option>
    </select>

    <div class="flex justify-center items-center">
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
</dialog>
@endsection
