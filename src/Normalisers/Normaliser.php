<?php namespace PhilipBrown\Payload\Normalisers;

interface Normaliser
{
    /**
     * Normalise a payload
     *
     * @param mixed $payload
     * @return Document
     */
    public function normalise($payload);

    /**
     * Return the Unserialiser
     *
     * @return Unserialiser
     */
    public function unserialiser();
}
