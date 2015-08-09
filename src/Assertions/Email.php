<?php namespace PhilipBrown\Payload\Assertions;

use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class Email implements Assertion
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
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) return true;

        throw new AssertionException(sprintf('%s is not a valid email', $value));
    }
}
