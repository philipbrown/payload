<?php namespace PhilipBrown\Payload\Readers;

class ArrayReader extends Reader
{
    /**
     * @var array
     */
    protected $extensions = ['php'];

    /**
     * Read the contents of a file
     *
     * @param string $path
     * @return array
     */
    public function read($path)
    {
        return $this->get($path);
    }
}
