<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testConfig(): void
    {
        $firstName = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName,$firstName2);
    }

    public function testConfigDependency(): void
    {
        $config = $this->app->make("config");
        $firstName3 = $config->get("contoh.author.first");
        $firstName = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName,$firstName2);
        self::assertEquals($firstName,$firstName3);
    }

    public function testFacadeMock() {
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Thoyib Hidayat');

        $firstName = Config::get('contoh.author.first');

        self::assertEquals("Thoyib Hidayat", $firstName);
    }
}
