<?php

if ( ! function_exists('app')) {
    function app()
    {
        return $application;
    }

    function view()
    {
        return app()->make(\App\View::class);
    }
}