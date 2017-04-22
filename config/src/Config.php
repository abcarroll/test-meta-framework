<?php
// A.B. Carroll <ben@hl9.net>
// MIT License

namespace abc;

/**
 * Common interface to configuration components.  Use any of the abc-php/config-* adapters to normalize APIs.
 *
 * Based off of the hassankhan/config package, with two additional static methods, loadStr() and loadFile() which are
 * documented below.  The original hassankhan package had a load() method (for files), but it was not a part of the
 * interface.
 *
 * @package    abc/Config
 * @link       http://github.com/abc-php/config
 *
 * @author     Jesus A. Domingo <jesus.domingo@gmail.com>
 * @author     Hassan Khan <contact@hassankhan.me>
 * @link       https://github.com/noodlehaus/config
 * @license    MIT
 */
interface Config
{
    /**
     * Factory method to load an \abc\Config object from a filename.  Auto-detects format from file extension.
     *
     * @param string $filename The file to load as a configuration object.
     *
     * @return Config
     */
    static public function loadFile($filename);

    /**
     * Factory method to load a \abc\Config object from a string.  Specify the format as you would the file extension.
     *
     * @param string  $filename The string to load as a configuration object.
     * @param string  $format   The format, specified as you would the file extension, such as 'ini', 'yml', or 'xml'
     *
     * @return Config
     */
    static public function loadStr($filename, $format);

    /**
     * Gets a configuration setting using a simple or nested key.
     * Nested keys are similar to JSON paths that use the dot
     * dot notation.
     *
     * @param  string $key
     * @param  mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Function for setting configuration values, using
     * either simple or nested keys.
     *
     * @param  string $key
     * @param  mixed  $value
     *
     * @return void
     */
    public function set($key, $value);

    /**
     * Function for checking if configuration values exist, using
     * either simple or nested keys.
     *
     * @param  string $key
     *
     * @return boolean
     */
    public function has($key);

    /**
     * Get all of the configuration items
     *
     * @return array
     */
    public function all();
}