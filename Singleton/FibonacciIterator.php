<?php

namespace Sharkzt\Fibonacci\Singleton;

/**
 * Class FibonacciIterator
 * @package Sharkzt\Fibonacci\Singleton
 */
class FibonacciIterator implements FibonacciIteratorInterface
{
    /**
     * @var int
     */
    private $number;
    /**
     * @var array
     */
    private $fibonacciSeries;
    /**
     * @var int
     */
    private $firstNumber;
    /**
     * @var int
     */
    private $secondNumber;

    /**
     * FibonacciIterator constructor.
     * @param int $number
     */
    public function __construct(int $number = 0)
    {
        $this->number = $number;
        $this->fibonacciSeries = [];
        $this->firstNumber = -1;
        $this->secondNumber = 1;
    }

    /**
     * Set count of series
     * @param int $number
     * @return mixed
     */
    public function setCount(int $number) {
        $this->number = $number;
        return $this;
    }

    /**
     * Call calculation of fibonacci series of certain length
     * @return bool
     */
    public function initialize():bool {
        if ($this->number > 0) return $this->iterate();
        return false;
    }

    /**
     * Calculate fibonacci series and push to fibonacci series array
     * @return bool
     */
    public function iterate():bool
    {
        for ($i = 0; $i < $this->number; $i++) {
            $currentNumber = $this->firstNumber + $this->secondNumber;
            $this->firstNumber = $this->secondNumber;
            $this->secondNumber = $currentNumber;
            array_push($this->fibonacciSeries, $currentNumber);
        }
        return true;
    }

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries():array
    {
        return $this->fibonacciSeries;
    }
}