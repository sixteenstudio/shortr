<?php

namespace App\Repositories\Contracts;

interface UrlRepository
{

    /**
     * Store the provided URL with the given slug.
     *
     * @param $url
     * @param $slug
     * @return PDORow
     */
    public function store($url, $slug);

    /**
     * See if a URL exists with the given slug.
     *
     * @param $slug
     * @return bool
     */
    public function exists($slug);

    /**
     * Find a URL from storage by the given slug.
     *
     * @param $slug
     * @return null|PDORow
     */
    public function find($slug);

}