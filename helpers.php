<?php

if ( ! function_exists('app')) {
    function app()
    {
        global $app;
        return $app;
    }

    function view()
    {
        return app()->make(\App\View::class);
    }
}