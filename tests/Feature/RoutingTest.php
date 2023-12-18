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

    public function testRouteParams(){
        $this->get('/products/1')->assertSeeText('Products : 1');
        $this->get('/products/2/items/yyy')->assertSeeText('Products : 2, Item : yyy');
    }

    public function testRouteParamsRegex() {
        $this->get('/category/100')->assertSeeText('Category : 100');
        $this->get('/category/test')->assertSeeText('404');
        $this->get('/user/123')->assertSeeText('User : 123');
        $this->get('/user')->assertSeeText('User : 404');
    }


}
