<?php

use App\Jobs\CreateTransactionJob;
use App\Jobs\ReminderTransactionJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    // @phpstan-ignore-next-line
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::job(new CreateTransactionJob)->dailyAt('07:00');
Schedule::job(new ReminderTransactionJob)->dailyAt('07:00');
