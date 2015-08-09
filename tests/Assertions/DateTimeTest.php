<?php namespace PhilipBrown\Payload\Tests\Assertions;

use PhilipBrown\Payload\Assertions\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_value_is_not_valid()
    {
        $this->setExpectedException('PhilipBrown\Payload\Assertions\Exceptions\AssertionException');

        DateTime::assert('not_a_valid_datetime');
    }

    /** @test */
    public function should_return_true_when_the_value_is_valid()
    {
        $this->assertTrue(DateTime::assert('2015-08-09T13:57:33+0000'));
    }

    /** @test */
    public function should_accept_custom_format()
    {
        $this->assertTrue(DateTime::assert('2015-08-09 13:57:33', ['format' => 'Y-m-d H:i:s']));
    }
}
