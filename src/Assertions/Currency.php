<?php namespace PhilipBrown\Payload\Assertions;

use PhilipBrown\Payload\Arr;
use PhilipBrown\Payload\Assertions\Exceptions\AssertionException;

class Currency implements Assertion
{
    /**
     * @var string
     */
    private static $path = '/../../data/currencies.json';

    /**
     * Assert the value is valid for the expectation
     *
     * @param mixed $value
     * @param array $options
     * @return bool
     */
    public static function assert($value, array $options = [])
    {
        $currencies = json_decode(file_get_contents(sprintf('%s%s', __DIR__, self::$path)), true);

        $attribute = Arr::pluck($options, 'attribute', 'name');

        if (Arr::create($currencies)->contains($attribute, $value)) return true;

        throw new AssertionException(sprintf('%s is not a currency', $value));
    }
}
