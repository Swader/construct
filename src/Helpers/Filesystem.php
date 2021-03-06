<?php

namespace JonathanTorres\Construct\Helpers;

use JonathanTorres\Construct\Defaults;

class Filesystem
{
    /**
     * Create a directory
     *
     * @param string  $path
     * @param boolean $recursive Defaults to false.
     *
     * @return boolean
     */
    public function makeDirectory($path, $recursive = false)
    {
        return mkdir($path, 0777, $recursive);
    }

    /**
     * Check if the path is a directory.
     *
     * @param string $path
     *
     * @return boolean
     */
    public function isDirectory($path)
    {
        return is_dir($path);
    }

    /**
     * Check if the path is a file.
     *
     * @param string $path
     *
     * @return boolean
     */
    public function isFile($path)
    {
        return is_file($path);
    }

    /**
     * Check if the path is readable.
     *
     * @param string $path
     *
     * @return boolean
     */
    public function isReadable($path)
    {
        return is_readable($path);
    }

    /**
     * Get the home directory.
     *
     * @return string
     */
    public function getHomeDirectory($os = PHP_OS)
    {
        if (strtoupper(substr($os, 0, 3)) !== 'WIN') {
            return getenv('HOME');
        }

        return getenv('userprofile');
    }

    /**
     * Get the default construct configuration file.
     *
     * @return string
     */
    public function getDefaultConfigurationFile()
    {
        return $this->getHomeDirectory()
            . DIRECTORY_SEPARATOR . Defaults::CONFIGURATION_FILE;
    }

    /**
     * Determine if system has a default configuration file.
     *
     * @return boolean boolean
     */
    public function hasDefaultConfigurationFile()
    {
        return $this->isFile($this->getDefaultConfigurationFile());
    }

    /**
     * Copy the given file a new location.
     *
     * @param string $path
     * @param string $target
     *
     * @return boolean
     */
    public function copy($path, $target)
    {
        return copy($path, $target);
    }

    /**
     * Move the given file to a new location.
     *
     * @param string $path
     * @param string $target
     *
     * @return boolean
     */
    public function move($path, $target)
    {
        $this->copy($path, $target);
        unlink($path);
    }

    /**
     * Get the contents of a file.
     *
     * @param string $path
     *
     * @return string
     */
    public function get($path)
    {
        return file_get_contents($path);
    }

    /**
     * Write the contents of a file.
     *
     * @param string $path
     * @param string $contents
     *
     * @return int
     */
    public function put($path, $contents)
    {
        return file_put_contents($path, $contents);
    }
}
