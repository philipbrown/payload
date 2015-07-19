<?php namespace PhilipBrown\Payload\Tests\Unserialisers;

use PhilipBrown\Payload\Unserialisers\JSONUnserialiser;

class JSONUnserialiserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_unserialise_input()
    {
        $unserialiser = new JSONUnserialiser;

        $this->assertEquals(['hello' => 'world'], $unserialiser->unserialise('{"hello":"world"}'));
    }
}
