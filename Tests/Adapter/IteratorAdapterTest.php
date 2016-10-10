<?php

namespace Sharkzt\Fibonacci\Tests\Adapter;

use Sharkzt\Fibonacci\Adapter\FibonacciIteratorAdapter;
use Sharkzt\Fibonacci\Singleton\FibonacciIterator;

class IteratorAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testClassConstructorFibParam_WithFib_ReturnObject()
    {
        $mock = $this->createMock(FibonacciIterator::class);
        $fib = new FibonacciIteratorAdapter($mock);
        $this->assertEquals(
            $mock,
            $fib->fibonacci
        );
    }

    public function testInitialize_WithMinusArgument_ReturnFalse() {
        $mock = $this->createMock(FibonacciIterator::class);
        $mock->expects($this->any())->method('initialize')->will($this->returnValue(false));
        $fibonacci = new FibonacciIteratorAdapter($mock);
        $this->assertEquals(
            $fibonacci->initialize(),
            $mock->initialize()
        );
        $this->assertFalse($fibonacci->initialize());
    }

    public function testGetSeries_With11_ReturnArray() {
        $mock = $this->createMock(FibonacciIterator::class);
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
        $fibonacci = new FibonacciIteratorAdapter($mock);
        $this->assertEquals(
            $mock->getSeries(),
            $fibonacci->getSeries()
        );
        $this->assertSame($series, $fibonacci->getSeries());
    }
}