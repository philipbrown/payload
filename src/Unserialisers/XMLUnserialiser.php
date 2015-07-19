<?php namespace PhilipBrown\Payload\Unserialisers;

class XMLUnserialiser implements Unserialiser
{
    /**
     * Unserialise an input
     *
     * @param string $input
     * @return array
     */
    public function unserialise($input)
    {
        return json_decode(json_encode(simplexml_load_string($input)), true);
    }
}
