<?php namespace PhilipBrown\Payload\Unserialisers;

class JSONUnserialiser implements Unserialiser
{
    /**
     * Unserialise an input
     *
     * @param string $input
     * @return array
     */
    public function unserialise($input)
    {
        return json_decode($input, true);
    }
}
