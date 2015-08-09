<?php namespace PhilipBrown\Payload\Assertions;

use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class Boolean implements Assertion
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
        if (is_bool($value)) return true;

        throw new AssertionException(sprintf('%s is not a boolean', $value));
    }
}
