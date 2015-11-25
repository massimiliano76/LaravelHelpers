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

if ( ! function_exists('gravatar'))
{
    /**
     * Get a user avatar from gravatar.com service.
     * 
     * @param  string   $email
     * @param  integer  $size
     * @param  string   $default
     * @param  string   $rating
     * @return string
     */
    function gravatar($email, $size = 100, $default = '', $rating = 'g')
    {
        $email = md5($email);
        $size = is_int($size) ? $size : 100;

        return "https://www.gravatar.com/avatar/{$email}?s={$size}&d={$default}&r={$rating}";
    }
}