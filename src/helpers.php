<?php

use Illuminate\Support\Facades\Lang;

if ( ! function_exists('t'))
{
    /**
     * Get a string from language file.
     *
     * @param $string
     * @param null $default
     * @param array $parameters
     * @return mixed
     */
    function t($string, $default = null, $parameters = [])
    {
        if(Lang::has($string)) {
            return Lang::get($string, $parameters);
        }

        return $default;
    }
}