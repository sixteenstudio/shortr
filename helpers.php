<?php

if ( ! function_exists('app')) {
    function app()
    {
        global $app;
        return $app;
    }
}


if ( ! function_exists('view')) {
    function view()
    {
        return app()->make(\App\View::class);
    }
}


if ( ! function_exists('config')) {
    function config()
    {
        return app()->config();
    }
}