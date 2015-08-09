<?php namespace PhilipBrown\Tests\Payload\Normaliser;

use PhilipBrown\Payload\Normalisers\JSONAPINormaliser;

class JSONAPINormaliserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_return_unserialiser()
    {
        $normaliser = new JSONAPINormaliser;

        $this->assertInstanceOf(
            'PhilipBrown\Payload\Unserialisers\Unserialiser', $normaliser->unserialiser());
    }
}
