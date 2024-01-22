<?php

use Illuminate\Support\Str;

if (!function_exists('urlSlug')) {
    function urlSlug($string, $wordsLimit = 10)
    {
        $words = Str::words($string, $wordsLimit, '');
        return Str::slug($words, '-');
    }
}
