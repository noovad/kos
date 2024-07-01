@extends('admin.layouts.app')

@section('title', 'Keuangan')
@section('judul', 'Keuangan')

@section('content')
<div class="m-4">
    <div class="card border border-grey text-black mt-4 mb-4">
        <div class="grid grid-cols-7 gap-2 p-2">
            <div class="col-span-6  rounded-lg">
                <p class="pl-3 -mb-2">% Tagihan Terbayar</p>
            </div>
            <div class="col-span-1 flex flex-col justify-center">
                <a href="{{ route('admin.transaction-status') }}" class="btn btn-xs bg-blue text-white border-none">Detail</a>
            </div>
        </div>
    </div>
    <div class="card border border-grey text-black mt-4 mb-4">
        <div class="grid grid-cols-7 gap-2 p-2">
            <div class="col-span-6  rounded-lg">
                <p class="pl-3 -mb-2">Laporan Keuangan</p>
            </div>
            <div class="col-span-1 flex flex-col justify-center">
                <a href="{{ route('admin.transaction-report') }}" class="btn btn-xs bg-blue text-white border-none">Detail</a>
            </div>
        </div>
    </div>
    <div class="card border border-grey text-black mt-4 mb-4">
        <div class="grid grid-cols-7 gap-2 p-2">
            <div class="col-span-6  rounded-lg">
                <p class="pl-3 -mb-2">Transaksi</p>
            </div>
            <div class="col-span-1 flex flex-col justify-center">
                <a href="{{ route('admin.transaction-list') }}" class="btn btn-xs bg-blue text-white border-none">Detail</a>
            </div>
        </div>
    </div>
</div>
    @endsection
    