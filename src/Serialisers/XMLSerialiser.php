<?php namespace PhilipBrown\Payload\Serialisers;

use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class XMLSerialiser implements Serialiser
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
        return (new Serializer(
            [new ObjectNormalizer()], [new XmlEncoder()]
        ))->serialize($input, 'xml');
    }
}
