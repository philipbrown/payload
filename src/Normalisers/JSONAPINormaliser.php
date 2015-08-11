<?php namespace PhilipBrown\Payload\Normalisers;

use PhilipBrown\Payload\Unserialisers\JSONUnserialiser;

class JSONAPINormaliser implements Normaliser
{
    /**
     * @var Unserialiser
     */
    protected $unserialiser;

    /**
     * Return the Unserialiser
     *
     * @return JSONUnserialiser
     */
    public function unserialiser()
    {
        if ($this->unserialiser) return $this->unserialiser;

        return $this->unserialiser = new JSONUnserialiser;
    }
}
