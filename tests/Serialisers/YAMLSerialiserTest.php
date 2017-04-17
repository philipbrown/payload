<?php namespace PhilipBrown\Payload\Tests\Serialisers;

use PhilipBrown\Payload\Serialisers\YAMLSerialiser;

class YAMLSerialiserTest  extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_serialise_input()
    {
        $serialiser = new YAMLSerialiser();

        $this->assertEquals(
            '{ hello: world }',
            $serialiser->serialise(['hello' => 'world'])
        );
    }
}
