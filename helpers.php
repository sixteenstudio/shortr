<?php

if ( ! function_exists('app')) {
    function app()
    {
        return $application;
    }

    function view()
    {
        return new \App\View();
    }
}