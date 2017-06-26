<?php

namespace Sharkzt\Fibonacci\Tests\Strategy;

use PHPUnit\Framework\TestCase;
use Sharkzt\Fibonacci\Singleton\FibonacciIterator;
use Sharkzt\Fibonacci\Singleton\Fibonacci;
use Sharkzt\Fibonacci\Strategy\FibonacciStrategy;

/**
 * Class StrategyTest
 */
class StrategyTest extends TestCase
{
    public function testClassConstructorIterationClassParam_WithFib_ReturnObject()
    {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $fib = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertEquals(
            $fib->iterationClass,
            $mockIteration
        );
    }

    public function testClassConstructorRecursionClassParam_WithFib_ReturnObject()
    {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $fib = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertEquals(
            $fib->recursionClass,
            $mockRecursion
        );
    }

    public function testClassConstructorRecursionParam_WithFib_ReturnString()
    {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $recursion = 'recursion';
        $fib = new FibonacciStrategy($mockRecursion, $mockIteration, $recursion);
        $this->assertEquals(
            $fib->recursionStrategy,
            $recursion
        );
    }

    public function testClassConstructorIterationParam_WithFib_ReturnString()
    {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $iteration = 'iteration';
        $fib = new FibonacciStrategy($mockRecursion, $mockIteration, '', $iteration);
        $this->assertEquals(
            $fib->iterationStrategy,
            $iteration
        );
    }

    public function testInitialize_WithMinusArgument_ReturnFalse() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $mockRecursion->expects($this->any())->method('initialize')->will($this->returnValue(false));
        $mockIteration->expects($this->any())->method('initialize')->will($this->returnValue(false));
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertEquals(
            $fibonacci->initialize(),
            $mockRecursion->initialize()
        );
    }

    public function testInitialize_WithPositiveArgument_ReturnTrue() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $mockRecursion->expects($this->any())->method('initialize')->will($this->returnValue(true));
        $mockIteration->expects($this->any())->method('initialize')->will($this->returnValue(true));
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertEquals(
            $fibonacci->initialize(),
            $mockRecursion->initialize()
        );
    }

    public function testSetCount_With4_ReturnObject() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $mockRecursion->expects($this->any())->method('setCount')->will($this->returnValue($mockRecursion));
        $mockRecursion->number = 4;
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertEquals(
            $fibonacci->setCount(4),
            $mockRecursion
        );
        $this->assertSame($mockRecursion, $fibonacci->setCount(4));
    }

    public function testGetSeries_With11_ReturnArray() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
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
        $mockRecursion->expects($this->any())->method('getSeries')->will($this->returnValue($series));
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertEquals(
            $fibonacci->getSeries(),
            $mockRecursion->getSeries()
        );
        $this->assertSame($series, $fibonacci->getSeries());
    }

    public function testSetStrategy_WithRecursion_ReturnTrue() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertTrue(
            $fibonacci->setStrategy('recursion')
        );
        $this->assertEquals($fibonacci->strategyClass, $mockRecursion);
    }

    public function testSetStrategy_WithIteration_ReturnTrue() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertTrue(
            $fibonacci->setStrategy('iteration')
        );
        $this->assertEquals($fibonacci->strategyClass, $mockIteration);
    }

    public function testSetStrategy_WithBadParam_ReturnFalse() {
        $mockRecursion = $this->createMock(Fibonacci::class);
        $mockIteration = $this->createMock(FibonacciIterator::class);
        $fibonacci = new FibonacciStrategy($mockRecursion, $mockIteration);
        $this->assertFalse(
            $fibonacci->setStrategy('bad param')
        );
    }
}