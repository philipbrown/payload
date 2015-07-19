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
        return file_exists($path);
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

        throw new FileDoesNotExistException(sprintf('%s is not a valid file', $path));
    }
}
