<?php
namespace App\Services;

class HelloServiceIndonesia implements HelloService
{
    public function hello($name) : string {
        return "Hello $name";
    }
}
