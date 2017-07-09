<?php

class Router {

    /**
     * The array of routes.
     *
     * @var array
     */
    protected $routes;

    /**
     * Router constructor.
     *
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Execute the route for the current request
     */
    public function executeForCurrentRequest()
    {

    }

}