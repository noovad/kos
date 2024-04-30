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
Route::view('/bill', 'user.bill')->name('user.bill');
Route::view('/profile', 'user.profile')->name('user.profile');
Route::view('/bill-detail', 'user.bill-detail')->name('user.bill-detail');

Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
Route::view('/admin/room', 'admin.room')->name('admin.room');
Route::view('/admin/room-type', 'admin.room-type')->name('admin.room-type');
Route::view('/admin/room-type/create', 'admin.room-type-create')->name('admin.room-type.create');
Route::view('/admin/room-type/update', 'admin.room-type-update')->name('admin.room-type.update');
Route::view('/admin/room-type/detail', 'admin.room-type-detail')->name('admin.room-type.detail');
Route::view('/admin/bill', 'admin.bill')->name('admin.bill');
Route::view('/admin/bill-status', 'admin.bill-status')->name('admin.bill-status');
Route::view('/admin/bill-user', 'admin.bill-user')->name('admin.bill-user');
Route::view('/admin/bill-list', 'admin.bill-list')->name('admin.bill-list');
Route::view('/admin/bill-report', 'admin.bill-report')->name('admin.bill-report');
Route::view('/admin/chat-menu', 'admin.chat-menu')->name('admin.chat-menu');
Route::view('/admin/chat', 'admin.chat')->name('admin.chat');
Route::view('/admin/users', 'admin.users')->name('admin.users');