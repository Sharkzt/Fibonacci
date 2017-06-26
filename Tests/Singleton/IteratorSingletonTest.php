<?php

namespace Sharkzt\Fibonacci\Tests\Singleton;

use PHPUnit\Framework\TestCase;
use Sharkzt\Fibonacci\Singleton\FibonacciIterator;

/**
 * Class IteratorSingletonTest
 */
class IteratorSingletonTest extends TestCase
{
    public function testClassConstructorFibSeriesParam_With1_ReturnArray()
    {
        $fibonacci = new \ReflectionClass('\Sharkzt\Fibonacci\Singleton\FibonacciIterator');
        $property = $fibonacci->getProperty('fibonacciSeries');
        $property->setAccessible(true);
        $fib = new FibonacciIterator(1);
        $fib->initialize();
        $this->assertEquals(
            $property->getValue($fib),
            [0]
        );
        $this->assertCount(1, $property->getValue($fib));
    }

    public function testClassConstructorFibSeriesParam_With3_ReturnArray()
    {
        $fibonacci = new \ReflectionClass('\Sharkzt\Fibonacci\Singleton\FibonacciIterator');
        $property = $fibonacci->getProperty('fibonacciSeries');
        $property->setAccessible(true);
        $fib = new FibonacciIterator(3);
        $fib->initialize();
        $this->assertEquals(
            $property->getValue($fib),
            [0, 1, 1]
        );
        $this->assertCount(3, $property->getValue($fib));
    }

    public function testClassConstructorNumberParam_With4_Return4()
    {
        $fibonacci = new \ReflectionClass('\Sharkzt\Fibonacci\Singleton\FibonacciIterator');
        $property = $fibonacci->getProperty('number');
        $property->setAccessible(true);
        $fib = new FibonacciIterator(3);
        $fib->initialize();
        $this->assertEquals(
            $property->getValue($fib),
            3
        );
    }

    public function testInitialize_WithMinusArgument_ReturnFalse() {
        $mock = $this->createMock(FibonacciIterator::class);
        $mock->expects($this->any())->method('initialize')->will($this->returnValue(false));
        $fibonacci = new FibonacciIterator(-10);
        $this->assertEquals(
            $mock->initialize(),
            $fibonacci->initialize()
        );
        $this->assertFalse($fibonacci->initialize());
    }

    public function testInitialize_WithPositiveArgument_ReturnTrue() {
        $mock = $this->createMock(FibonacciIterator::class);
        $mock->expects($this->any())->method('initialize')->will($this->returnValue(true));
        $fibonacci = new FibonacciIterator(10);
        $this->assertEquals(
            $fibonacci->initialize(),
            $mock->initialize()
        );
        $this->assertTrue($fibonacci->initialize());
    }

    public function testIterate_WithPositiveArgument_ReturnTrue() {
        $mock = $this->createMock(FibonacciIterator::class);
        $mock->expects($this->any())->method('iterate')->will($this->returnValue(true));
        $mock->expects($this->any())->method('initialize')->will($this->returnValue($mock->iterate()));
        $fibonacci = new FibonacciIterator(7);
        $this->assertEquals(
            $fibonacci->iterate(),
            $mock->iterate()
        );
        $this->assertTrue($fibonacci->initialize());
    }

    public function testSetCount_With4_ReturnObject() {
        $mock = $this->createMock(FibonacciIterator::class);
        $mock->expects($this->any())->method('setCount')->will($this->returnValue($mock));
        $mock->number = 4;
        $this->assertEquals(
            $mock,
            $mock->setCount(4)
        );
        $fib = new FibonacciIterator();
        $this->assertEquals($fib->setCount(4), new FibonacciIterator(4));
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
        $fibonacci = new FibonacciIterator(11);
        $fibonacci->initialize();
        $this->assertEquals(
            $mock->getSeries(),
            $fibonacci->getSeries()
        );
        $this->assertSame($series, $fibonacci->getSeries());
    }
}