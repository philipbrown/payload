<?php namespace PhilipBrown\Payload\Assertions;

use DateTime as DT;
use PhilipBrown\Payload\Arr;
use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class DateTime implements Assertion
{
    /**
     * @var string
     */
    private static $format = DT::ISO8601;

    /**
     * Assert the value is valid for the expectation
     *
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public static function assert($value, array $options = [])
    {
        $format = Arr::pluck($options, 'format', self::$format);

        $date = DT::createFromFormat($format, $value);

        if ($date && $date->format($format) == $value) return true;

        throw new AssertionException(sprintf('%s is not a valid datetime', $value));
    }
}
