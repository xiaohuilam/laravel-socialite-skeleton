<?php

if (!function_exists('socialite_type')) {
    function socialite_type()
    {
        return config('laravel-socialite-skeleton.types');
    }
}