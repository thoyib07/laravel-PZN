<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ConfigTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
       $firstName = config('contoh.author.first');
       $lastName = config('contoh.author.last');
       $email = config('contoh.email');
       $web = config('contoh.web');

       self::assertEquals("Thoyib", $firstName);
       self::assertEquals("Hidayat", $lastName);
       self::assertEquals("thoyibh07@gmail.com", $email);
       self::assertEquals("thoyib07.github.io", $web);
    }
}
