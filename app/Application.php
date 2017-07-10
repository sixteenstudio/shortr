<?php

namespace App;

class Application
{

    /**
     * The application container.
     *
     * @var Container
     */
    private $container;

    /**
     * The application router.
     *
     * @var Router
     */
    private $router;

    /**
     * Application constructor.
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
        $this->boot();
    }

    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Execute the application.
     *
     * @return void
     */
    public function run()
    {
        if ( ! $this->router->executeForCurrentRequest()) {
            $this->abort(404);
        }

        $this->outputHeaders();
        $this->outputContent();
    }

    /**
     * Make the requested entity using the application container.
     */
    public function make($entity)
    {
        return $this->container->make($entity);
    }

    /**
     * Abort the application.
     *
     * @param $httpCode
     * @return void
     */
    public function abort($httpCode)
    {
        http_response_code($httpCode);
        include('../views/errors/404.php');
        die();
    }

    /**
     * Output the application headers.
     *
     * @return void
     */
    public function outputHeaders()
    {
        http_response_code($this->router->getResponse()->getHttpCode());
        if ($this->router->getResponse()->hasHeaders()) {
            print($this->router->getResponse()->getHeaders());
        }
    }

    /**
     * Output the application headers.
     *
     * @return void
     */
    public function outputContent()
    {
        if ($this->router->getResponse()->hasBody()) {
            print($this->router->getResponse()->getBody());
        }
    }

    /**
     * Boot the application.
     */
    protected function boot()
    {
        session_start();

        // Extract dependencies from the configuration
        $dependencies = $this->configuration['dependencies'];

        // Create the container instance for this application with specified dependencies
        $this->container = new Container($dependencies);

        // Set up the router
        $this->router = new Router($this->configuration['routes']);
    }

}