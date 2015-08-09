<?php namespace PhilipBrown\Payload\Tests\Assertions;

use PhilipBrown\Payload\Assertions\Uuid;

class UuidTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_value_is_not_valid()
    {
        $this->setExpectedException('PhilipBrown\Payload\Assertions\Exceptions\AssertionException');

        Uuid::assert('nope');
    }

    /** @test */
    public function should_return_true_when_the_value_is_valid()
    {
        $this->assertTrue(Uuid::assert('a9f1f752-7c0a-4cfc-9762-ef4eba644502'));
    }
}
