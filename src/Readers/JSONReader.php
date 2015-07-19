<?php namespace PhilipBrown\Payload\Readers;

class JSONReader extends Reader
{
    /**
     * @var array
     */
    protected $extensions = ['json'];

    /**
     * Read the contents of a file
     *
     * @param string $path
     * @return array
     */
    public function read($path)
    {
        return json_decode($this->contents($path), true);
    }
}
