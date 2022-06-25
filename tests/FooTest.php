<?php

namespace App\Tests;

use App\Foo;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * 
 * @covers \App\Foo
 */
final class FooTest extends TestCase
{
    public function testBar(): void
    {
        /** @var MockObject&Foo $foo */
        $foo = $this->getMockBuilder(Foo::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['bar'])
            ->getMock();
        $foo
            ->expects($this->once())
            ->method('bar')
            ->willReturn('foo');
        
        $foo->__destruct();
    }

    public function testBarUsingCreateMock(): void
    {
        /** @var MockObject&Foo $foo */
        $foo = $this->createMock(Foo::class);
        $foo
            ->expects($this->once())
            ->method('bar')
            ->willThrowException(new \Exception());

        $foo->__destruct();
    }

    public function testBazUsingGetMock(): void
    {
        /** @var MockObject&Foo $foo */
        $foo = $this->getMockBuilder(Foo::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['bar'])
            ->getMock();
        $foo
            ->expects($this->once())
            ->method('bar')
            ->willReturn('foo');
        
        $foo->baz();
    }

    public function testBazUsingCreateMock(): void
    {
        /** @var MockObject&Foo $foo */
        $foo = $this->createMock(Foo::class);
        $foo
            ->expects($this->once())
            ->method('bar')
            ->willReturn('foo');

        $foo->baz();
    }
}