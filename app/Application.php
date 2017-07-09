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
        $this->outputHeaders();
        $this->outputContent();
    }

    /**
     * Output the application heades.
     *
     * @return void
     */
    public function outputHeaders()
    {
        // TODO: Output headers
    }

    /**
     * Output the application heades.
     *
     * @return void
     */
    public function outputContent()
    {
        // TODO: Output content
        echo 'Welcome!';
    }

    /**
     * Boot the application.
     */
    protected function boot()
    {
        // Extract dependencies from the configuration
        $dependencies = $this->configuration['dependencies'];

        // Create the container instance for this application with specified dependencies
        $this->container = new Container($dependencies);
    }

}