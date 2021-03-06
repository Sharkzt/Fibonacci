<?php

namespace Sharkzt\Fibonacci\Tests\Adapter;

use PHPUnit\Framework\TestCase;
use Sharkzt\Fibonacci\Adapter\FibonacciIteratorAdapter;
use Sharkzt\Fibonacci\Singleton\FibonacciIterator;

/**
 * Class IteratorAdapterTest
 */
class IteratorAdapterTest extends TestCase
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

    public function testSetCount_With4_ReturnObject() {
        $mock = $this->createMock(FibonacciIterator::class);
        $mock->expects($this->any())->method('setCount')->will($this->returnValue($mock));
        $mock->number = 4;
        $fibonacci = new FibonacciIteratorAdapter($mock);
        $this->assertEquals(
            $mock,
            $fibonacci->setCount(4)
        );
        $this->assertSame($mock, $fibonacci->setCount(4));
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