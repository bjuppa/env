<?php
if (!function_exists('env')) {

    function env($key, $default = null)
    {
        return \Fewagency\Env\Env::env($key, $default);
    }

}
