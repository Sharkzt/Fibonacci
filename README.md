Fibonacci
===========

**Fibonacci** php classes implementation as singleton, strategy and adapter design patterns

[![Build Status](https://travis-ci.org/Sharkzt/Fibonacci.svg?branch=master)](https://travis-ci.org/Sharkzt/Fibonacci)
[![Coverage Status](https://coveralls.io/repos/github/Sharkzt/Fibonacci/badge.svg)](https://coveralls.io/github/Sharkzt/Fibonacci)

Installation
------------

The recommended way to install bundle is through
[Composer](http://getcomposer.org/):

```bash
$ composer require sharkzt/fibonacci
```


Usage Examples
--------------

### Singleton

``` php
//get fibonacci series via class with recursion approach
$fibonacciWithRecursion = new \Sharkzt\Fibonacci\Singleton\Fibonacci(11);
return $fibonacciWithRecursion->getSeries();

//get fibonacci series via class with iteration approach 
$fibonacciWithIteration = new \Sharkzt\Fibonacci\Singleton\FibonacciIterator(11);
$fibonacciWithIteration->initialize();
return $fibonacciWithIteration->getSeries();

```

Code above will return [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55].

### Adapter

``` php
//get fibonacci series via iterator adapter
$fibonacciIteratorAdapter = new FibonacciIteratorAdapter(new FibonacciIterator());
$fibonacciIteratorAdapter
    ->setCount(11)
    ->initialize();

return $fibonacciIteratorAdapter->getSeries();

//get fibonacci series via recursion adapter
$fibonacciIteratorAdapter = new FibonacciRecursionAdapter(new Fibonacci());
$fibonacciIteratorAdapter
    ->setCount(11)
    ->initialize();

return $fibonacciIteratorAdapter->getSeries();

```

This will return [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55].

### Strategy

``` php
//get fibonacci series with iteration strategy
$fibonacciStrategy = new FibonacciStrategy(new Fibonacci(), new FibonacciIterator());
$fibonacciStrategy->setStrategy($fibonacciStrategy->iterationStrategy);
$fibonacciStrategy
    ->setCount(11)
    ->initialize();

return $fibonacciStrategy->getSeries();

//get fibonacci series with recursion strategy
$fibonacciStrategy = new FibonacciStrategy(new Fibonacci(), new FibonacciIterator());
$fibonacciStrategy->setStrategy($fibonacciStrategy->recursionStrategy);
$fibonacciStrategy
    ->setCount(11)
    ->initialize();

return $fibonacciStrategy->getSeries();

```

Result is [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55].

License
-------

Fibonacci classes are released under the MIT License. See the bundled LICENSE file for
details.
