<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_run_migrations(): void
    {
        Artisan::call('migrate', ['--force' => true]);
        $this->assertTrue(true);
    }
}
