@extends('user.layouts.app')

@section('title', 'Chat')
@section('judul', 'Chat')

@section('content')

<style>
    .lavel {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="mt-4 mb-4">
    @for ($i = 1; $i <= 20; $i++)
        <div class="card border border-grey text-black mt-4 mb-4">
            <a href="{{ route('user.chat') }}" class="grid grid-cols-7 gap-2"
                style="padding-left: 10px; padding-right:10px">
                <div class="col-span-5 flex flex-col justify-center pl-2">
                    <p>Nama</p>
                    <small
                        class="lavel m-1">Name : isi listrik bo, satu titik dua koma blablablablablablabla</small>
                </div>
                <div class="col-span-2 flex justify-end">
                    <small class="self-end m-1">time</small>
                </div>
            </a>
            </a>
        </div>
    @endfor
</div>
@endsection
