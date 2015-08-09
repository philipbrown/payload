<?php namespace PhilipBrown\Payload\Assertions;

use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class Uuid implements Assertion
{
    /**
     * @var string
     */
    private static $regex = '/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/';

    /**
     * Assert the value is valid for the expectation
     *
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public static function assert($value, array $options = [])
    {
        $value = str_replace(['urn:', 'uuid:', '{', '}'], '', $value);

        if (preg_match(self::$regex, $value)) return true;

        throw new AssertionException(sprintf('%s is not a uuid', $value));
    }
}
