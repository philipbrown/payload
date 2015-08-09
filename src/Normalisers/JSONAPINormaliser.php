<?php namespace PhilipBrown\Payload\Normalisers;

use PhilipBrown\Payload\Unserialisers\JSONUnserialiser;

class JSONAPINormaliser implements Normaliser
{
    /**
     * @var Unserialiser
     */
    protected $unserialiser;

    /**
     * Normalise a payload
     *
     * @param mixed $payload
     * @return Document
     */
    public function normalise($payload)
    {

    }

    /**
     * Return the Unserialiser
     *
     * @return Unserialiser
     */
    public function unserialiser()
    {
        if ($this->unserialiser) return $this->unserialiser;

        return $this->unserialiser = new JSONUnserialiser;
    }
}
