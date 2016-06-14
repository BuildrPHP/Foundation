<?php namespace BuildR\Foundation\Exception;

use BuildR\Foundation\Object\ArrayConvertibleInterface;
use \Exception;
use \Throwable;
use \IteratorAggregate;
use \ArrayIterator;
use \Countable;

/**
 * This exception will thrown when a method is not called properly.
 *
 * BuildR PHP Framework
 *
 * @author Zoltán Borsos <zolli07@gmail.com>
 * @package Foundation
 * @subpackage Exception
 *
 * @copyright    Copyright 2015, Zoltán Borsos.
 * @license      https://github.com/Zolli/BuildR/blob/master/LICENSE.md
 * @link         https://github.com/Zolli/BuildR
 *
 * @codeCoverageIgnore
 */
class AggregatedException extends Exception implements \IteratorAggregate, Countable, ArrayConvertibleInterface {

    /**
     * @var array
     */
    private $collection = [];

    /**
     * Add a new exception to the stack
     *
     * @param Throwable $throwable
     */
    public function add(Throwable $throwable) {
        $this->collection[] = $throwable;
    }

    /**
     * Determines, the current exception stack contains any exception
     *
     * @return bool
     */
    public function hasAny() {
        return ($this->count() > 0);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator() {
        return new ArrayIterator($this->collection);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray() {
        return $this->collection;
    }

    /**
     * {@inheritDoc}
     */
    public function count() {
        return count($this->collection);
    }

}
