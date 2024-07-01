<?php

namespace Tests\Unit;

use App\Jobs\CreateTransactionJob;
use Tests\TestCase;

class CreateTransactionJobTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $job = new CreateTransactionJob();
        $job->handle();
    }
}
