<?php namespace PhilipBrown\Payload\Serialisers;

interface Serialiser
{
    /**
     * Serialise an input.
     *
     * @param mixed $input
     *
     * @return string
     */
    public function serialise($input);
}
