<?php namespace PhilipBrown\Payload\Unserialisers;

interface Unserialiser
{
    /**
     * Unserialise an input
     *
     * @param string $input
     * @return array
     */
    public function unserialise($input);
}
