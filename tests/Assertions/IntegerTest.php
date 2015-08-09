<?php namespace PhilipBrown\Payload\Tests\Assertions;

use PhilipBrown\Payload\Assertions\Integer;

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_value_is_not_valid()
    {
        $this->setExpectedException('PhilipBrown\Payload\Assertions\Exceptions\AssertionException');

        Integer::assert('123');
    }

    /** @test */
    public function should_return_true_when_the_value_is_valid()
    {
        $this->assertTrue(Integer::assert(123));
    }
}
