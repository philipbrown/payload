<?php namespace PhilipBrown\Payload\Tests\Assertions;

use PhilipBrown\Payload\Assertions\Country;

class CountryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_value_is_not_valid()
    {
        $this->setExpectedException('PhilipBrown\Payload\Assertions\Exceptions\AssertionException');

        Country::assert('nope');
    }

    /** @test */
    public function should_return_true_when_the_value_is_valid()
    {
        $this->assertTrue(Country::assert('United Kingdom'));
    }

    /** @test */
    public function should_accept_custom_country_attribute_to_compare_against()
    {
        $this->assertTrue(Country::assert('GB', ['attribute' => 'alpha-2']));

        $this->assertTrue(Country::assert('GBR', ['attribute' => 'alpha-3']));
    }
}
