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
