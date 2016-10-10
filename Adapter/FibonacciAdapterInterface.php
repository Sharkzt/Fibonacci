<?php

namespace Sharkzt\Fibonacci\Adapter;

/**
 * Interface FibonacciAdapterInterface
 * @package Sharkzt\Fibonacci\Adapter
 */
interface FibonacciAdapterInterface
{
    /**
     * Call calculation of fibonacci series of certain length
     * @return bool
     */
    public function initialize();

    /**
     * Set count of series
     * @param int $number
     * @return mixed
     */
    public function setCount(int $number);

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries():array;
}