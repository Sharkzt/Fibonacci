<?php

namespace Sharkzt\Fibonacci\Adapter;

use Sharkzt\Fibonacci\FibonacciInterface;

/**
 * Class FibonacciRecursionAdapter
 */
class FibonacciRecursionAdapter implements FibonacciAdapterInterface
{
    /**
     * @var FibonacciInterface
     */
    public $fibonacci;

    /**
     * FibonacciRecursionAdapter constructor.
     * @param FibonacciInterface $fibonacci
     */
    public function __construct(FibonacciInterface $fibonacci)
    {
        $this->fibonacci = $fibonacci;
    }

    /**
     * Set count of series
     * @param int $number
     * @return mixed
     */
    public function setCount(int $number = 0)
    {
        return $this->fibonacci->setCount($number);
    }


    /**
     * @return bool
     */
    public function initialize()
    {
        return $this->fibonacci->initialize();
    }

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries(): array
    {
        return $this->fibonacci->getSeries();
    }
}
