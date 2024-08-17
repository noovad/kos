@extends('layouts.app')

@section('content')
@php
$routeName = Route::currentRouteName();
@endphp

@if ($routeName == 'admin.room-type-update' || $routeName == 'admin.room-type-detail')
	@livewire($routeName, ['id' => $id])
@elseif ($routeName == 'admin.chat')
	@livewire($routeName, ['name' => $name])
@else
	@livewire($routeName)
@endif


@endsection