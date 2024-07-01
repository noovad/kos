<?php

namespace Tests\Unit;

use App\Jobs\ReminderTransactionJob;
use Tests\TestCase;

class ReminderTransactionJobTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $job = new ReminderTransactionJob();
        $job->handle();
    }
}
