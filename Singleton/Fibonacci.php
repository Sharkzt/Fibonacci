<?php

namespace Sharkzt\Fibonacci\Singleton;

use Sharkzt\Fibonacci\FibonacciInterface;

/**
 * Class Fibonacci
 * @package Sharkzt\Fibonacci\Singleton
 */
class Fibonacci implements FibonacciInterface
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
     * Fibonacci constructor.
     * @param int $number
     */
    public function __construct(int $number = 0)
    {
        $this->number = $number;
        $this->fibonacciSeries = [];
        $this->initialize();
    }

    /**
     * Call calculation of fibonacci series of certain length
     * @return bool
     */
    public function initialize():bool
    {
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
            array_push($this->fibonacciSeries, $this->calculate($i));
        }
        return true;
    }

    /**
     * Calculate fibonacci number
     * @param int $number
     * @return int
     */
    public function calculate(int $number):int
    {
        if ($number >= 0 && $number <= 1) return $number;
        return ($this->calculate($number - 1) + $this->calculate($number - 2));
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