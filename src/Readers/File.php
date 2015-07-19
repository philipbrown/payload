<?php namespace PhilipBrown\Payload\Readers;

use PhilipBrown\Payload\Readers\Exceptions\FileDoesNotExistException;

class File
{
    /**
     * Get the extension from a path
     *
     * @param string $path
     * @return string
     */
    public static function extension($path)
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * Check to see if the file exists
     *
     * @param string $path
     * @return bool
     */
    public static function exists($path)
    {
        if (file_exists($path)) return true;

        throw new FileDoesNotExistException(sprintf('%s is not a valid file', $path));
    }

    /**
     * Get the contents of a file
     *
     * @param string $path
     * @return string
     */
    public static function contents($path)
    {
        if (self::exists($path)) return trim(file_get_contents($path));
    }

    /**
     * Require a file
     *
     * @param string $path
     * @return array
     */
    public static function get($path)
    {
        if (self::exists($path)) return require $path;
    }
}
