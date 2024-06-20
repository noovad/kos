<?php

namespace Tests\Unit;

use App\Jobs\SendWhatsappJob;
use Tests\TestCase;

class SendWhatsappJobTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_sendMessage(): void
    {
        $job = new SendWhatsappJob('6285157633575', 'test dari php');
        $job->handle();
    }
}
