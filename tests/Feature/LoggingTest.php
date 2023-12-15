<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_logging(): void
    {
        $data = [
            "user" => "Thoyib Hidayat"
        ];
        Log::info('hello info');
        Log::alert('hello alert');
        Log::warning('hello warning');
        Log::error('hello error');
        Log::critical('hello critical');

        self::assertTrue(true);
    }

    public function test_context() {
        $data = [
            "user" => "Thoyib Hidayat"
        ];
        Log::info('hello info', $data);
        self::assertTrue(true);
    }

    public function test_with_context() {
        $data = [
            "user" => "Thoyib Hidayat"
        ];
        Log::withContext($data);
        Log::info('hello info');
        Log::warning('hello warning');
        Log::error('hello error');
        self::assertTrue(true);
    }

    public function test_file_channel() {
        $data = [
            "user" => "Thoyib Hidayat"
        ];
        
        $fileLogger = Log::channel('file');
        // $fileLogger->withContext($data);
        $fileLogger->info('ini info');
        $fileLogger->warning('ini warning');
        $fileLogger->error('ini error');
        self::assertTrue(true);
    }
}
