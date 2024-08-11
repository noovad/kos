<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// user
Route::view('/home', 'user.home')->name('user.home');
Route::view('/chat-menu', 'user.chat-menu')->name('user.chat-menu');
Route::view('/chat', 'user.chat')->name('user.chat');
Route::view('/room-list', 'user.room-list')->name('user.room-list');
Route::view('/room-detail', 'user.room-detail')->name('user.room-detail');
Route::view('/transaction', 'user.transaction')->name('user.transaction');
Route::view('/profile', 'user.profile')->name('user.profile');
Route::view('/transaction-detail', 'user.transaction-detail')->name('user.transaction-detail');

//admin
Route::view('/admin', 'layouts.pages')->name('admin.dashboard');
Route::view('/admin/dashboard', 'layouts.pages')->name('admin.dashboard');
Route::view('/admin/room', 'layouts.pages')->name('admin.room');
Route::view('/admin/room-type', 'layouts.pages')->name('admin.room-type');
Route::view('/admin/room-type/create', 'layouts.pages')->name('admin.room-type-posts');



Route::view('/admin/transaction', 'layouts.pages')->name('admin.transaction');
Route::view('/admin/transaction-draft', 'layouts.pages')->name('admin.transaction-post');
Route::view('/admin/transaction-room', 'layouts.pages')->name('admin.transaction-room');
Route::view('/admin/transaction-user', 'layouts.pages')->name('admin.transaction-user');
Route::view('/admin/transaction-list', 'layouts.pages')->name('admin.transaction-index');
Route::view('/admin/transaction-report', 'layouts.pages')->name('admin.transaction-report');
Route::view('/admin/chat', 'layouts.pages')->name('admin.chat');
Route::view('/admin/users', 'layouts.pages')->name('admin.users-index');

Route::get('/admin/room-type/update/{id}', function ($id) {
    return view('layouts.pages', ['id' => $id]);
})->name('admin.room-type-update');
Route::get('/admin/room-type/detail/{id}', function ($id) {
    return view('layouts.pages', ['id' => $id]);
})->name('admin.room-type-detail');