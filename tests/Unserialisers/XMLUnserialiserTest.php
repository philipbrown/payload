<?php namespace PhilipBrown\Payload\Tests\Unserialisers;

use PhilipBrown\Payload\Unserialisers\XMLUnserialiser;

class XMLUnserialiserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_unserialise_input()
    {
        $unserialiser = new XMLUnserialiser;

        $this->assertEquals(['hello' => 'world'], $unserialiser->unserialise('
            <xml><hello>world</hello></xml>
        '));
    }
}
