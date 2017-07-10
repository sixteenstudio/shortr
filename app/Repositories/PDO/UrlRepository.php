<?php

namespace App\Repositories\PDO;

use App\Repositories\Contracts\PDORow;

class UrlRepository implements \App\Repositories\Contracts\UrlRepository
{

    /**
     * Store the provided URL with the given slug.
     *
     * @param $url
     * @param $slug
     * @return PDORow
     */
    public function store($url, $slug)
    {
        // TODO: Implement store() method.
    }

    /**
     * See if a URL exists with the given slug.
     *
     * @param $slug
     * @return bool
     */
    public function exists($slug)
    {
        // TODO: Implement exists() method.
    }

    /**
     * Find a URL from storage by the given slug.
     *
     * @param $slug
     * @return null|PDORow
     */
    public function find($slug)
    {
        // TODO: Implement find() method.
    }
    
}