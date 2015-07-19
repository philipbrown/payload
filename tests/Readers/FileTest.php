<?php namespace PhilipBrown\Payload\Readers;

use PhilipBrown\Payload\Readers\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_get_extension_from_path()
    {
        $this->assertEquals('json', File::extension('data.json'));
    }

    /** @test */
    public function should_check_to_see_if_file_exists()
    {
        $this->assertTrue(File::exists(sprintf('%s/stubs/data.json', __DIR__)));

        $this->assertFalse(File::exists('invalid.json'));
    }

    /** @test */
    public function should_throw_exception_when_attempting_to_get_contents_of_file_that_does_not_exist()
    {
        $this->setExpectedException('PhilipBrown\Payload\Readers\Exceptions\FileDoesNotExistException');

        $contents = File::contents('invalid.json');
    }

    /** @test */
    public function should_get_the_contents_of_a_file()
    {
        $contents = File::contents(sprintf('%s/stubs/data.json', __DIR__));

        $this->assertEquals(json_encode(['hello' => 'world']), $contents);
    }
}
