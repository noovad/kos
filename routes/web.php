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
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/room', 'admin.room')->name('admin.room');
Route::view('/admin/room-type', 'admin.room-type')->name('admin.room-type');
Route::view('/admin/room-type/create', 'admin.room-type-create')->name('admin.room-type.create');
Route::get('/admin/room-type/update/{id}', function ($id) {
    return view('admin.room-type-update', ['id' => $id]);
})->name('admin.room-type.update');
Route::get('/admin/room-type/detail/{id}', function ($id) {
    return view('admin.room-type-detail', ['id' => $id]);
})->name('admin.room-type.detail');
Route::view('/admin/transaction', 'admin.transaction')->name('admin.transaction');
Route::view('/admin/transaction-status', 'admin.transaction-status')->name('admin.transaction-status');
Route::view('/admin/transaction-user', 'admin.transaction-user')->name('admin.transaction-user');
Route::view('/admin/transaction-list', 'admin.transaction-list')->name('admin.transaction-list');
Route::view('/admin/transaction-report', 'admin.transaction-report')->name('admin.transaction-report');
Route::view('/admin/chat-menu', 'admin.chat-menu')->name('admin.chat-menu');
Route::view('/admin/chat', 'admin.chat')->name('admin.chat');
Route::view('/admin/users', 'admin.users')->name('admin.users');
