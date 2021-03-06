<?php

namespace Sharkzt\Fibonacci\Singleton;

use Sharkzt\Fibonacci\FibonacciInterface;

/**
 * Interface FibonacciIteratorInterface
 * @package Sharkzt\Fibonacci\Singleton
 */
interface FibonacciIteratorInterface extends FibonacciInterface
{
    /**
     * Call calculation of fibonacci series of certain length
     * @return bool
     */
    public function initialize():bool;

    /**
     * Set count of series
     * @param int $number
     * @return mixed
     */
    public function setCount(int $number): FibonacciInterface;

    /**
     * Calculate fibonacci series and add to fibonacci series storage
     * @return bool
     */
    public function iterate(): bool;

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries(): array;
}
