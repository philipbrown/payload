<?php namespace PhilipBrown\Payload\Assertions;

use PhilipBrown\Payload\Arr;
use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class Locale implements Assertion
{
    /**
     * Assert the value is valid for the expectation
     *
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public static function assert($value, array $options = [])
    {
        $locales = intlcal_get_available_locales();

        if (Arr::create($locales)->contains($value)) return true;

        throw new AssertionException(sprintf('%s is not a locale', $value));
    }
}
