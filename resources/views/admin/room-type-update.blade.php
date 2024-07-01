@extends('admin.layouts.app')

@section('judul', 'Ubah Tipe Kamar')

@section('content')

@livewire('admin.room-type-update', ['id' => $id])

@endsection
