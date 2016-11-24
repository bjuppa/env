<?php

namespace Fewagency\Env;

use Dotenv\Dotenv;

class Env
{
    /**
     * @var Dotenv singleton instance
     */
    protected static $dotenv;

    /**
     * Initialise Dotenv and make the env() function globally available
     *
     * @param        $path
     * @param string $file
     * @return array
     */
    public static function init($path = null, $file = '.env')
    {
        $lines = self::load($path, $file);
        self::publishEnvFunction();

        return $lines;
    }

    /**
     * Get the value of an environment variable
     *
     * @param      $key
     * @param null $default
     * @return bool|null|string|void
     */
    public static function env($key, $default = null)
    {
        //The implementation of this function is totally inspired by laravel/framework
        $value = getenv($key);
        if ($value === false) {
            //TODO: in laravel/framework this default value is interpreted if it's a callable, nice feature to add!
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        // If first and last chars are quotes, extract the string within the quotes
        if (substr($value, 0, 1) == '"' && substr($value, -1, 1) == '"') {
            return substr($value, 1, -1);
        }

        return $value;
    }

    /**
     * Load .env file
     *
     * @param $path
     * @param $file
     * @return array
     */
    public static function load($path = null, $file = '.env')
    {
        $lines = self::dotenv($path, $file)->load();

        return $lines;
    }

    /**
     * Attempt to publish the env() function globally
     */
    public static function publishEnvFunction()
    {
        require_once(__DIR__ . '/env_function.php');
    }

    /**
     * Get the singleton Dotenv instance
     *
     * @param null   $path
     * @param string $file
     * @return Dotenv
     */
    public static function dotenv($path = null, $file = '.env')
    {
        if (empty(self::$dotenv)) {
            if (is_null($path)) {
                // Default path to the root composer project above the vendor directory
                $path = __DIR__ . str_repeat('/..', 4) . '/';
            }
            self::$dotenv = new Dotenv($path, $file);
        }

        return self::$dotenv;
    }
}
