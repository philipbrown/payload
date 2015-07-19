<?php namespace PhilipBrown\Payload\Readers;

use Symfony\Component\Yaml\Yaml;

class YAMLReader extends Reader
{
    /**
     * @var array
     */
    protected $extensions = ['yaml', 'yml'];

    /**
     * Read the contents of a file
     *
     * @param string $path
     * @return array
     */
    public function read($path)
    {
        return Yaml::parse($this->contents($path));
    }
}
