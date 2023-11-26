<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepedencyInjectTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_depedency_injection(): void
    {
        $foo = new Foo();
        $bar = new Bar($foo);

        self::assertEquals("Foo and Bar", $bar->bar());
    }
}
