<?php
/**
 * Created by PhpStorm.
 * User: matthewcollison
 * Date: 09/07/2017
 * Time: 23:18
 */

namespace App;

use Closure;

class Container
{

    /**
     * Singletons bound to the container.
     *
     * @var array
     */
    protected $singletons = [];

    /**
     * The array of application dependencies.
     *
     * @var array
     */
    protected $dependencies = [];

    /**
     * Container constructor.
     *
     * @param array $dependencies
     */
    public function __construct(array $dependencies)
    {
        $this->dependencies = $dependencies;
    }

    /**
     * Create the requested entity.
     *
     * @param $entity
     * @return mixed
     */
    public function make($entity)
    {
        if ($this->dependencySpecified($entity)) {
            return $this->getDependencyImplementation($entity);
        } else {
            return new $entity;
        }
    }

    /**
     * Check if the dependency has been specified in the configuration.
     *
     * @param $requestedEntity
     * @return bool
     */
    public function dependencySpecified($requestedEntity)
    {
        if (isset($this->dependencies['shared'][$requestedEntity]) || isset($this->dependencies['bound'][$requestedEntity])) {
            return true;
        }

        return false;
    }

    /**
     * Get the dependency implementation for the requested entity.
     *
     * @param $requestedEntity
     * @return mixed
     */
    protected function getDependencyImplementation($requestedEntity)
    {
        if (isset($this->dependencies['shared'][$requestedEntity])) {
            $concrete = $this->dependencies['shared'][$requestedEntity];
        } else {
            $concrete = $this->dependencies['bound'][$requestedEntity];
        }

        if ($concrete instanceof Closure) {
            return $concrete();
        } else {
            return new $concrete;
        }
    }

}