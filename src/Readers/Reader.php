<?php namespace PhilipBrown\Payload\Readers;

use PhilipBrown\Payload\Readers\Exceptions\InvalidFileTypeException;

abstract class Reader
{
    /**
     * @var array
     */
    protected $extensions = [];

    /**
     * Read the contents of a file
     *
     * @param string $path
     * @return array
     */
    abstract public function read($path);

    /**
     * Check to see if the file is valid
     *
     * @param string $path
     * @return bool
     */
    public function check($path)
    {
        $extension = File::extension($path);

        if (! in_array($extension, $this->extensions)) {
            throw new InvalidFileTypeException(
                sprintf('%s is an invalid file type for the %s class', $extension, get_class($this)));
        }

        return true;
    }

    /**
     * Get the contents of the file
     *
     * @param string $path
     * @return string
     */
    public function contents($path)
    {
        if ($this->check($path)) return File::contents($path);
    }

    /**
     * Require the contents of the file
     *
     * @param string $path
     * @return array
     */
    public function get($path)
    {
        if ($this->check($path)) return File::get($path);
    }
}
