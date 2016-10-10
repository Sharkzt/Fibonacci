<?php

namespace Sharkzt\Fibonacci\Adapter;

use Sharkzt\Fibonacci\Singleton\FibonacciIteratorInterface;

/**
 * Class FibonacciIteratorAdapter
 * @package Sharkzt\Fibonacci\Adapter
 */
class FibonacciIteratorAdapter implements FibonacciAdapterInterface
{
    /**
     * @var FibonacciIteratorInterface
     */
    public $fibonacci;

    public function __construct(FibonacciIteratorInterface $fibonacci)
    {
        $this->fibonacci = $fibonacci;
    }

    /**
     * Set count of series
     * @param int $number
     * @return mixed
     */
    public function setCount(int $number = 0) {
        return $this->fibonacci->setCount($number);
    }


    /**
     * @return bool
     */
    public function initialize() {
        return $this->fibonacci->initialize();
    }

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries():array {
        return $this->fibonacci->getSeries();
    }
}