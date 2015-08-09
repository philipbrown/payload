<?php namespace PhilipBrown\Payload\Tests\Assertions;

use PhilipBrown\Payload\Assertions\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_value_is_not_valid()
    {
        $this->setExpectedException('PhilipBrown\Payload\Assertions\Exceptions\AssertionException');

        Currency::assert('nope');
    }

    /** @test */
    public function should_return_true_when_the_value_is_valid()
    {
        $this->assertTrue(Currency::assert('British Pound'));
    }

    /** @test */
    public function should_accept_custom_currency_attribute_to_compare_against()
    {
        $this->assertTrue(Currency::assert('GBP', ['attribute' => 'iso_code']));
    }
}
