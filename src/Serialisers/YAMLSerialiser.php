<?php namespace PhilipBrown\Payload\Serialisers;

use Symfony\Component\Yaml\Dumper;

class YAMLSerialiser implements Serialiser
{
    /**
     * Serialise an input.
     *
     * @param mixed $input
     *
     * @return string
     */
    public function serialise($input)
    {
        return (new Dumper())->dump($input);
    }
}
