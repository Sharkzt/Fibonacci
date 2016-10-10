<?php

namespace Sharkzt\Fibonacci\Strategy;

use Sharkzt\Fibonacci\Adapter\FibonacciAdapterInterface;
use Sharkzt\Fibonacci\FibonacciInterface;
use Sharkzt\Fibonacci\Singleton\FibonacciIteratorInterface;

class FibonacciStrategy implements FibonacciAdapterInterface, FibonacciStrategyInterface
{
    /**
     * @var FibonacciInterface
     */
    public $iterationClass;
    /**
     * @var FibonacciInterface
     */
    public $recursionClass;
    /**
     * @var FibonacciInterface
     */
    public $strategyClass;
    /**
     * @var string
     */
    public $recursionStrategy;
    /**
     * @var string
     */
    public $iterationStrategy;

    /**
     * FibonacciStrategy constructor.
     * @param FibonacciInterface $recursionClass
     * @param FibonacciIteratorInterface $iterationClass
     * @param string $recursion
     * @param string $iteration
     */
    public function __construct(FibonacciInterface $recursionClass, FibonacciIteratorInterface $iterationClass,
                                string $recursion = 'recursion',
                                string $iteration = 'iteration')
    {
        $this->recursionClass = $recursionClass;
        $this->iterationClass = $iterationClass;
        $this->recursionStrategy = $recursion;
        $this->iterationStrategy = $iteration;
        $this->strategyClass = $recursionClass;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function setStrategy(string $type = 'recursion'):bool
    {
        if ($type === $this->recursionStrategy) {
            $this->strategyClass = $this->recursionClass;
        } elseif ($type === $this->iterationStrategy) {
            $this->strategyClass = $this->iterationClass;
        } else {
            return false;
        }
        return true;
    }

    /**
     * Set count of series
     * @param int $number
     * @return mixed
     */
    public function setCount(int $number = 0) {
        return $this->strategyClass->setCount($number);
    }


    /**
     * @return bool
     */
    public function initialize():bool {
        return $this->strategyClass->initialize();
    }

    /**
     * Return fibonacci series
     * @return array
     */
    public function getSeries():array {
        return $this->strategyClass->getSeries();
    }
}