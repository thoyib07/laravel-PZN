<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testBasicRouting(): void
    {
        $this->get('/thoyib')->assertStatus(200)->assertSeeText('Hello Thoyib Hidayat');
    }

    public function testRedirect(): void
    {
        $this->get('/youtube')->assertRedirect('/thoyib');
    }

    public function testFallback(): void
    {
        $this->get('/test')->assertSeeText('404 nih');
    }


}
