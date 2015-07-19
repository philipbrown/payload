<?php namespace PhilipBrown\Payload\Readers;

class XMLReader extends Reader
{
    /**
     * @var array
     */
    protected $extensions = ['xml'];

    /**
     * Read the contents of a file
     *
     * @param string $path
     * @return array
     */
    public function read($path)
    {
        $contents = $this->contents($path);

        return json_decode(json_encode(simplexml_load_string($contents)), true);
    }
}
