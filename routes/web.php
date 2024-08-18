<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.pages')->name('user.home');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'layouts.pages')->name('user.login');
});

Route::view('/home', 'layouts.pages')->name('user.home');
Route::view('/room-index', 'layouts.pages')->name('user.room-index');
Route::get('/room-detail/{roomType}', function ($roomType) {
    return view('layouts.pages', ['roomType' => $roomType]);
})->name('user.room-detail');

// user
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::view('/chat', 'layouts.pages')->name('user.chat');
    Route::view('/transaction', 'layouts.pages')->name('user.transaction-index');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'layouts.pages')->name('user.profile');
});

//admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::view('/admin', 'layouts.pages')->name('admin.dashboard');
    Route::view('/admin/dashboard', 'layouts.pages')->name('admin.dashboard');
    Route::view('/admin/room', 'layouts.pages')->name('admin.room-index');
    Route::view('/admin/room-type', 'layouts.pages')->name('admin.room-type-index');
    Route::view('/admin/room-type/create', 'layouts.pages')->name('admin.room-type-posts');
    Route::view('/admin/transaction', 'layouts.pages')->name('admin.transaction');
    Route::view('/admin/transaction-draft', 'layouts.pages')->name('admin.transaction-post');
    Route::view('/admin/transaction-room', 'layouts.pages')->name('admin.transaction-room');
    Route::view('/admin/transaction-user', 'layouts.pages')->name('admin.transaction-user');
    Route::view('/admin/transaction-list', 'layouts.pages')->name('admin.transaction-index');
    Route::view('/admin/transaction-report', 'layouts.pages')->name('admin.transaction-report');
    Route::view('/admin/users', 'layouts.pages')->name('admin.users-index');

    Route::view('/admin/chat', 'layouts.pages')->name('admin.chat-menu');
    Route::get('/admin/chat/{name}', function ($name) {
        return view('layouts.pages', ['name' => $name]);
    })->name('admin.chat');

    Route::view('/chat-group', 'layouts.pages')->name('admin.chat-group');

    Route::get('/admin/room-type/update/{id}', function ($id) {
        return view('layouts.pages', ['id' => $id]);
    })->name('admin.room-type-update');
});
