<?php namespace PhilipBrown\Payload\Tests\Serialisers;

use PhilipBrown\Payload\Serialisers\JSONSerialiser;

class JSONSerialiserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_serialise_input()
    {
        $serialiser = new JSONSerialiser();

        $this->assertEquals(
            '{"hello":"world"}',
            $serialiser->serialise(['hello' => 'world'])
        );
    }
}
