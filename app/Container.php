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
        // If the requested entity is a singleton that's already been instantiated, just return that.
        if (isset($this->singletons[$requestedEntity])) {
            return $this->singletons[$requestedEntity];
        }

        // If the entity is shared, bind it to the container so it only needs to be instantiated once.
        $isShared = false;

        if (isset($this->dependencies['shared'][$requestedEntity])) {
            $concrete = $this->dependencies['shared'][$requestedEntity];
            $isShared = true;
        } else {
            $concrete = $this->dependencies['bound'][$requestedEntity];
        }

        if ($concrete instanceof Closure) {
            if ($isShared) {
                return $this->singletons[$requestedEntity] = $concrete();
            }

            return $concrete;
        } else {
            if ($isShared) {
                return $this->singletons[$requestedEntity] = new $concrete;
            }

            return new $concrete;
        }
    }

}