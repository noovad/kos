@extends('user.layouts.app')

@section('title', 'Profil')
@section('judul', 'Profil')

@section('content')
<div class="flex justify-center bg-white drop-shadow-2xl mx-10 rounded-lg mt-4">
    <div class="card p-2 flex flex-col justify-center items-center">
        <div class="avatar placeholder mb">
            <div class="bg-bluebg text-neutral-content rounded-full w-24">
                <span class="text-5xl font-bold text-blue">N</span>
            </div>
        </div>
        <h3 class="text-xl font-semibold text-blue">Username</h3>
        <small class="-m-1 mb-4">Agustus 2023</small>
        <div>
            <a class="btn mb-2 w-full font-light btn-sm">Ubah username dan password</a>
            <a class="btn mb-2 w-full font-light btn-sm">Notifikasi</a>
            <a class="btn mb-2 w-full font-light btn-sm">Bahasa</a>
            <a class="btn mb-2 w-full font-light btn-sm">Tema</a>
        </div>
    </div>
</div>

@endsection
