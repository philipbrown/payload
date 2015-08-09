<?php namespace PhilipBrown\Payload\Tests\Assertions;

use PhilipBrown\Payload\Assertions\Boolean;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_value_is_not_valid()
    {
        $this->setExpectedException('PhilipBrown\Payload\Assertions\Exceptions\AssertionException');

        Boolean::assert('nope');
    }

    /** @test */
    public function should_return_true_when_the_value_is_valid()
    {
        $this->assertTrue(Boolean::assert(true));
    }
}
