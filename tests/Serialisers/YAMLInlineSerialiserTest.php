<?php namespace PhilipBrown\Payload\Tests\Serialisers;

use PhilipBrown\Payload\Serialisers\YAMLInlineSerialiser;

class YAMLInlineSerialiserTest  extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_serialise_input()
    {
        $serialiser = new YAMLInlineSerialiser();

        $this->assertEquals(
            'hello: world
',
            $serialiser->serialise(['hello' => 'world'])
        );
    }
}
