<?php

namespace Sharkzt\Fibonacci\Singleton;

/**
 * Interface FibonacciIteratorInterface
 * @package Sharkzt\Fibonacci\Singleton
 */
interface FibonacciIteratorInterface
{
    /**
     * Call calculation of fibonacci series of certain length
     * @return bool
     */
    public function initialize():bool;

    /**
     * Calculate fibonacci series and add to fibonacci series storage
     * @return bool
     */
    public function iterate():bool;

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries():array;
}