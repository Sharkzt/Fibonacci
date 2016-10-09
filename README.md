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

$arr = new \Sharkzt\Fibonacci\Singleton\Fibonacci(11);
return $arr->getSeries();

```

Above code returns [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55].

License
-------

Fibonacci classes are released under the MIT License. See the bundled LICENSE file for
details.
