@extends('user.layouts.app')

@section('title', 'Chat')
@section('judul', 'Chat')

@section('content')
    
    <div class="px-2 mb-20">
        @for ($i = 0; $i < 10; $i++)
            <div class="chat chat-end">
                <div class="chat-header">
                    <small>Me</small>
                </div>
                <div class="chat-bubble">
                    <p>You were the Chose One!</p>
                    <small class="opacity-50">12:45</small>
                </div>
            </div>
        @endfor
        <div id="endOfChat"></div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('endOfChat').scrollIntoView();
        };
    </script>

@endsection