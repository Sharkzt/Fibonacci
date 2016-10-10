<?php

namespace Sharkzt\Fibonacci\Tests\Adapter;

use Sharkzt\Fibonacci\Adapter\FibonacciRecursionAdapter;
use Sharkzt\Fibonacci\Singleton\Fibonacci;

class RecursionAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testClassConstructorFibParam_WithFib_ReturnObject()
    {
        $mock = $this->createMock(Fibonacci::class);
        $fib = new FibonacciRecursionAdapter($mock);
        $this->assertEquals(
            $mock,
            $fib->fibonacci
        );
    }

    public function testInitialize_WithMinusArgument_ReturnFalse() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('initialize')->will($this->returnValue(false));
        $fibonacci = new FibonacciRecursionAdapter($mock);
        $this->assertEquals(
            $mock->initialize(),
            $fibonacci->initialize()
        );
        $this->assertObjectHasAttribute('fibonacci', $fibonacci);
    }

    public function testGetSeries_With11_ReturnArray() {
        $mock = $this->createMock(Fibonacci::class);
        $series = [
            0,
            1,
            1,
            2,
            3,
            5,
            8,
            13,
            21,
            34,
            55
        ];
        $mock->expects($this->any())->method('getSeries')->will($this->returnValue($series));
        $fibonacci = new FibonacciRecursionAdapter($mock);
        $this->assertEquals(
            $mock->getSeries(),
            $fibonacci->getSeries()
        );
        $this->assertSame($series, $fibonacci->getSeries());
    }
}