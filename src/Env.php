<?php

namespace Fewagency\Env;

use Dotenv\Dotenv;

class Env
{
    /**
     * @var Dotenv
     */
    protected static $dotenv;

    /**
     * Initialise Dotenv and make the env() function globally available
     *
     * @param        $path
     * @param string $file
     * @return array
     */
    public static function init($path, $file = '.env')
    {
        $lines = self::dotenv($path, $file)->load();

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
        $value = getenv($key);
        if ($value === false) {
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
     * Get the singleton Dotenv instance
     *
     * @param null   $path
     * @param string $file
     * @return Dotenv
     */
    public static function dotenv($path = null, $file = '.env')
    {
        if (empty(self::$dotenv)) {
            self::$dotenv = new Dotenv($path, $file);
        }

        return self::$dotenv;
    }
}
