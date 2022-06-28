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
            ->willReturn('correct');

        $result = $foo->runMe();
        $this->assertSame('correct', $result);
    }

    public function testBarUsingCreateMock(): void
    {
        /** @var MockObject&Foo $foo */
        $foo = $this->createPartialMock(Foo::class, ['bar']);

        $foo
            ->expects($this->once())
            ->method('bar')
            ->willReturn('correct');

        $result = $foo->runMe();
        $this->assertSame('correct', $result);
    }
}