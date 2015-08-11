<?php namespace PhilipBrown\Payload\Normalisers;

interface Normaliser
{
    /**
     * Return the Unserialiser
     *
     * @return Papertrail\Payload\Unserialisers\Unserialiser
     */
    public function unserialiser();
}
