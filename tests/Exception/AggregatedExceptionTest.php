<?php namespace BuildR\Foundation\Tests\Exception;

use BuildR\Foundation\Exception\AggregatedException;
use BuildR\Foundation\Object\ArrayConvertibleInterface;

class AggregatedExceptionTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \BuildR\Foundation\Exception\AggregatedException
     */
    private $aggregatedException;

    public function setUp() {
        parent::setUp();
        
        $this->aggregatedException = new AggregatedException();
    }

    public function testItStoreAndCountsExceptionProperly() {
        $this->assertCount(0, $this->aggregatedException);
        $this->aggregatedException->add(new \Exception());
        $this->assertCount(1, $this->aggregatedException);
    }

    public function testItCastToArrayProperly() {
        $this->assertInstanceOf(ArrayConvertibleInterface::class, $this->aggregatedException);
        $this->assertEquals([], $this->aggregatedException->toArray());
    }

    /**
     * @expectedException \TypeError
     */
    public function testItStoreOnlyThrowable() {
        $this->aggregatedException->add(new \stdClass());
    }

    public function testItCanReturnValidIterator() {
        $this->aggregatedException->add(new \Exception());
        $iterator = $this->aggregatedException->getIterator();

        $this->assertInstanceOf(\ArrayIterator::class, $iterator);
        $this->assertEquals(1, $iterator->count());
    }

}
