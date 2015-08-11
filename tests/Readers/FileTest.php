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
    public function should_return_true_when_file_exists()
    {
        $this->assertTrue(File::exists(sprintf('%s/stubs/data.json', __DIR__)));
    }

    /** @test */
    public function should_return_false_when_files_does_not_exist()
    {
        $this->assertFalse(File::exists('invalid.json'));
    }

    /** @test */
    public function should_throw_exception_when_getting_contents_of_file_that_does_not_exist()
    {
        $this->setExpectedException('PhilipBrown\Payload\Readers\Exceptions\FileDoesNotExistException');

        File::contents('invalid.json');
    }

    /** @test */
    public function should_get_the_contents_of_a_file()
    {
        $contents = File::contents(sprintf('%s/stubs/data.json', __DIR__));

        $this->assertEquals(json_encode(['hello' => 'world']), $contents);
    }

    /** @test */
    public function should_throw_exception_when_getting_file_that_does_not_exist()
    {
        $this->setExpectedException('PhilipBrown\Payload\Readers\Exceptions\FileDoesNotExistException');

        File::get('invalid.json');
    }

    /** @test */
    public function should_get_a_file()
    {
        $contents = File::get(sprintf('%s/stubs/data.php', __DIR__));

        $this->assertEquals(['hello' => 'world'], $contents);
    }
}
