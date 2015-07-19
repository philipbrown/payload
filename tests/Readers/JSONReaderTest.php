<?php namespace PhilipBrown\Payload\Tests\Readers;

use PhilipBrown\Payload\Readers\JSONReader;

class JSONReaderTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_invalid_file_type()
    {
        $this->setExpectedException('PhilipBrown\Payload\Readers\Exceptions\InvalidFileTypeException');

        $reader = new JSONReader;

        $reader->read('invalid.txt');
    }

    /** @test */
    public function should_read_file()
    {
        $reader = new JSONReader;

        $contents = $reader->read(sprintf('%s/stubs/data.json', __DIR__));

        $this->assertEquals(['hello' => 'world'], $contents);
    }
}
