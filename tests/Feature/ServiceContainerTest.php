<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testServiceContainer(): void
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo",$foo->foo());
        self::assertEquals("Foo",$foo2->foo());
        self::assertNotSame($foo,$foo2);
    }

    public function testBind(){
        $this->app->bind(Person::class, function ($app) {
            return new Person("Thoyib", "Hidayat");
        });
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertEquals('Thoyib',$person1->firstName);
        self::assertEquals('Thoyib',$person2->firstName);
        self::assertNotSame($person1,$person2);
    }

    public function testSingleton(){
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Thoyib", "Hidayat");
        });
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertEquals('Thoyib',$person1->firstName);
        self::assertEquals('Thoyib',$person2->firstName);
        self::assertSame($person1,$person2);
    }

    public function testInstance(){
        $person = new Person("Thoyib","Hidayat");
        $this->app->instance(Person::class,$person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        self::assertEquals('Thoyib',$person1->firstName);
        self::assertEquals('Thoyib',$person2->firstName);
        self::assertSame($person,$person1);
        self::assertSame($person1,$person2);
    }

    public function testDepedencyInjection(){
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class); 
        $bar2 = $this->app->make(Bar::class); 
        self::assertEquals("Foo and Bar", $bar1->bar());
        self::assertSame($foo, $bar1->foo);
        self::assertSame($bar1,$bar2);
    }

    public function testHelloService() {
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals("Hello Thoyib", $helloService->hello("Thoyib"));
    }
}
