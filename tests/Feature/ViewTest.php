<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testView(): void
    {
        $this->get('/hello')->assertSeeText('Hello Thoyib Hidayat');
        $this->get('/hello-again')->assertSeeText('Hello Thoyib Hidayat');
    
    }
    public function testNestedView(): void
    {
        $this->get('/hello-world')->assertSeeText('Hello Thoyib Hidayat');
    }

    public function testTemplate() {
        $this->view('hello', ['name' => 'Thoyib'])->assertSeeText('Hello Thoyib');
    }
}
