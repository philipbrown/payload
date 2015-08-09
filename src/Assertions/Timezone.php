<?php namespace PhilipBrown\Payload\Assertions;

use Exception;
use DateTimeZone;
use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class Timezone implements Assertion
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
        try {
            new DateTimeZone($value); return true;
        } catch (Exception $e) {
            throw new AssertionException(sprintf('%s is not an timezone', $value));
        }
    }
}
