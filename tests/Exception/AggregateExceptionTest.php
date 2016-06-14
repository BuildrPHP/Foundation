<?php namespace BuildR\Foundation\Tests\Exception;

use BuildR\Foundation\Exception\AggregateException;
use BuildR\Foundation\Object\ArrayConvertibleInterface;

class AggregateExceptionTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \BuildR\Foundation\Exception\AggregateException
     */
    private $aggregateException;

    public function setUp() {
        parent::setUp();
        
        $this->aggregateException = new AggregateException();
    }

    public function testItStoreAndCountsExceptionProperly() {
        $this->assertCount(0, $this->aggregateException);
        $this->aggregateException->add(new \Exception());
        $this->assertCount(1, $this->aggregateException);
    }

    public function testItCastToArrayProperly() {
        $this->assertInstanceOf(ArrayConvertibleInterface::class, $this->aggregateException);
        $this->assertEquals([], $this->aggregateException->toArray());
    }

    /**
     * @expectedException \TypeError
     */
    public function testItStoreOnlyThrowable() {
        $this->aggregateException->add(new \stdClass());
    }

    public function testItCanReturnValidIterator() {
        $this->aggregateException->add(new \Exception());
        $iterator = $this->aggregateException->getIterator();

        $this->assertInstanceOf(\ArrayIterator::class, $iterator);
        $this->assertEquals(1, $iterator->count());
    }

}
