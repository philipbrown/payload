<?php namespace PhilipBrown\Payload\Tests\Readers;

use PhilipBrown\Payload\Readers\YAMLReader;

class YAMLReaderTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_invalid_file_type()
    {
        $this->setExpectedException('PhilipBrown\Payload\Readers\Exceptions\InvalidFileTypeException');

        $reader = new YAMLReader;

        $reader->read('invalid.txt');
    }

    /** @test */
    public function should_read_file()
    {
        $reader = new YAMLReader;

        $contents = $reader->read(sprintf('%s/stubs/data.yaml', __DIR__));

        $this->assertEquals(['hello' => 'world'], $contents);
    }
}
