<?php

use App\Jobs\CreateTransactionJob;
use App\Models\Setting;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

$time = Setting::where('name', 'notifikasi')->first()->value ?? '07:00';
Schedule::job(new CreateTransactionJob)->dailyAt($time);

