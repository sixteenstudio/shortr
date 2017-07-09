<?php

namespace App;

class Router {

    /**
     * The array of routes.
     *
     * @var array
     */
    protected $routes;

    /**
     * The response for this route.
     *
     * @var Response
     */
    protected $response;

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
        foreach ($this->routes as $route) {
            if ($route['matcher']()) {
                $this->response = $route['uses']();
                return true;
            }
        }

        return false;
    }

    /**
     * Get the response for the current route.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

}