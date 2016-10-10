<?php

namespace Sharkzt\Fibonacci\Strategy;

/**
 * Interface FibonacciStrategyInterface
 * @package Sharkzt\Fibonacci\Strategy
 */
interface FibonacciStrategyInterface
{
    /**
     * Set strategy of class usage
     * @param string $type
     * @return bool
     */
    public function setStrategy(string $type = 'recursion'):bool;
}