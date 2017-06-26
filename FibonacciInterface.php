<?php

namespace Sharkzt\Fibonacci;

/**
 * @author Alexander Pysarchuk <then.bemyguest@gmail.com>
 *
 * Make dependency injection with this interface to keep your code solid
 * Interface FibonacciInterface
 * @package Sharkzt\Fibonacci
 */
interface FibonacciInterface
{
    /**
     * Call calculation of fibonacci series of certain length
     * @return bool
     */
    public function initialize(): bool;

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
     * Calculate fibonacci number
     * @param int $number
     * @return int
     */
    public function calculate(int $number): int;

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries(): array;
}
