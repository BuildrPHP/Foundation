<?php namespace BuildR\Foundation\Exception;

use BuildR\Foundation\Object\ArrayConvertibleInterface;
use \Exception;
use \Throwable;
use \IteratorAggregate;
use \ArrayIterator;
use \Countable;

class AggregatedException extends Exception implements \IteratorAggregate, Countable, ArrayConvertibleInterface {

    private $collection = [];

    public function add(Throwable $throwable) {
        $this->collection[] = $throwable;
    }

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
