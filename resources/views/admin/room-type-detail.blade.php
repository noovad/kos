@extends('layouts.app')

@section('judul', 'Detail Tipe Kamar')

@section('content')
    @livewire('admin.room-type-detail', ['id' => $id])
@endsection
