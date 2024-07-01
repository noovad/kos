@extends('user.layouts.app')

@section('title', 'Transaksi')
@section('judul', 'Transaksi')

@section('content')
<div class="px-2 mt-4 mb-20">
    @for ($i = 0; $i < 20; $i++)
    <div class="card border border-grey text-black mt-4 mb-4">
        <div class="grid grid-cols-7 gap-2 p-2">
            <div class="col-span-5 rounded-lg">
                <p class="pl-3 -mb-2">Bulan {{$i}}</p>
                <small class="pl-3">status</small>
            </div>
            <div class="expand-button col-span-2 flex flex-col justify-center">
                <a class="btn btn-xs bg-blue text-white border-none" href="{{ route('user.transaction-detail') }}">Lihat</a>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection
