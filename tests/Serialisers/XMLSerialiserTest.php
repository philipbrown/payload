<?php namespace PhilipBrown\Payload\Tests\Serialisers;

use PhilipBrown\Payload\Serialisers\XMLSerialiser;

class XMLSerialiserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_serialise_input()
    {
        $serialiser = new XMLSerialiser();

        $this->assertXmlStringEqualsXmlString(
            '<response><hello>world</hello></response>',
            $serialiser->serialise(['hello' => 'world'])
        );
    }
}
