<?php namespace PhilipBrown\Payload\Tests\Readers;

use PhilipBrown\Payload\Readers\ArrayReader;

class ArrayReaderTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_throw_exception_when_invalid_file_type()
    {
        $this->setExpectedException('PhilipBrown\Payload\Readers\Exceptions\InvalidFileTypeException');

        $reader = new ArrayReader;

        $reader->read('invalid.txt');
    }

    /** @test */
    public function should_read_file()
    {
        $reader = new ArrayReader;

        $contents = $reader->read(sprintf('%s/stubs/data.php', __DIR__));

        $this->assertEquals(['hello' => 'world'], $contents);
    }
}
