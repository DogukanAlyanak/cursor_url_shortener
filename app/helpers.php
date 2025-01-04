<?php

if (!function_exists('theme_path')) {
    function theme_path($path = '')
    {
        $theme = config('theme.active', 'tema_1');
        return "themes.{$theme}.{$path}";
    }
}
