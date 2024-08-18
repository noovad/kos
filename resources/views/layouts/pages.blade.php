@extends('layouts.app')

@section('content')
    @php
        $routeName = Route::currentRouteName();
    @endphp

    @if ($routeName == 'admin.room-type-update' || $routeName == 'admin.room-type-detail')
        @livewire($routeName, ['id' => $id])
    @elseif ($routeName == 'admin.chat')
        @livewire($routeName, ['name' => $name])
    @elseif ($routeName == 'user.room-detail')
        @livewire($routeName, ['roomType' => $roomType])
    @else
        @livewire($routeName)
    @endif
@endsection
