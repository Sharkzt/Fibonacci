<?php

namespace Sharkzt\Fibonacci\Tests\Singleton;

use Sharkzt\Fibonacci\Singleton\Fibonacci;

class SingletonTest extends \PHPUnit_Framework_TestCase
{
    public function testClassConstructorFibSeriesParam_With1_ReturnArray()
    {
        $fibonacci = new \ReflectionClass('\Sharkzt\Fibonacci\Singleton\Fibonacci');
        $property = $fibonacci->getProperty('fibonacciSeries');
        $property->setAccessible(true);
        $this->assertEquals(
            $property->getValue(new Fibonacci(1)),
            [0]
        );
        $this->assertCount(1, $property->getValue(new Fibonacci(1)));
    }

    public function testClassConstructorFibSeriesParam_With3_ReturnArray()
    {
        $fibonacci = new \ReflectionClass('\Sharkzt\Fibonacci\Singleton\Fibonacci');
        $property = $fibonacci->getProperty('fibonacciSeries');
        $property->setAccessible(true);
        $this->assertEquals(
            $property->getValue(new Fibonacci(3)),
            [0, 1, 1]
        );
        $this->assertCount(3, $property->getValue(new Fibonacci(3)));
    }

    public function testClassConstructorNumberParam_With4_Return4()
    {
        $fibonacci = new \ReflectionClass('\Sharkzt\Fibonacci\Singleton\Fibonacci');
        $property = $fibonacci->getProperty('number');
        $property->setAccessible(true);
        $this->assertEquals(
            $property->getValue(new Fibonacci(3)),
            3
        );
    }

    public function testInitialize_WithMinusArgument_ReturnFalse() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('initialize')->will($this->returnValue(false));
        $fibonacci = new Fibonacci(-10);
        $this->assertEquals(
            $fibonacci->initialize(),
            $mock->initialize()
        );
        $this->assertFalse($fibonacci->initialize());
    }

    public function testInitialize_WithPositiveArgument_ReturnTrue() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('initialize')->will($this->returnValue(true));
        $fibonacci = new Fibonacci(10);
        $this->assertEquals(
            $fibonacci->initialize(),
            $mock->initialize()
        );
        $this->assertTrue($fibonacci->initialize());
    }

    public function testIterate_WithPositiveArgument_ReturnTrue() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('iterate')->will($this->returnValue(true));
        $mock->expects($this->any())->method('initialize')->will($this->returnValue($mock->iterate()));
        $fibonacci = new Fibonacci(7);
        $this->assertEquals(
            $fibonacci->iterate(),
            $mock->iterate()
        );
        $this->assertTrue($fibonacci->initialize());
    }

    public function testCalculate_With1_Return1() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('calculate')->will($this->returnValue(1));
        $mock->expects($this->any())->method('iterate')->will($this->returnValue($mock->calculate(1)));
        $mock->expects($this->any())->method('initialize')->will($this->returnValue($mock->iterate()));
        $fibonacci = new Fibonacci(2);
        $this->assertEquals(
            $fibonacci->calculate(1),
            $mock->calculate(1)
        );
    }

    public function testCalculate_With7_Return13() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('calculate')->will($this->returnValue(13));
        $mock->expects($this->any())->method('iterate')->will($this->returnValue($mock->calculate(7)));
        $mock->expects($this->any())->method('initialize')->will($this->returnValue($mock->iterate()));
        $fibonacci = new Fibonacci(7);
        $this->assertEquals(
            $mock->calculate(7),
            $fibonacci->calculate(7)
        );
        $this->assertSame(13, $fibonacci->calculate(7));
    }

    public function testCalculate_With4_Return3() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('calculate')->will($this->returnValue(3));
        $mock->expects($this->any())->method('iterate')->will($this->returnValue($mock->calculate(4)));
        $mock->expects($this->any())->method('initialize')->will($this->returnValue($mock->iterate()));
        $fibonacci = new Fibonacci(7);
        $this->assertEquals(
            $mock->calculate(4),
            $fibonacci->calculate(4)
        );
        $this->assertSame(3, $fibonacci->calculate(4));
    }

    public function testSetCount_With4_ReturnObject() {
        $mock = $this->createMock(Fibonacci::class);
        $mock->expects($this->any())->method('setCount')->will($this->returnValue($mock));
        $mock->number = 4;
        $this->assertEquals(
            $mock,
            $mock->setCount(4)
        );
        $this->assertSame($mock, $mock->setCount(4));
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
        $fibonacci = new Fibonacci(11);
        $this->assertEquals(
            $mock->getSeries(),
            $fibonacci->getSeries()
        );
        $this->assertSame($series, $fibonacci->getSeries());
    }
}