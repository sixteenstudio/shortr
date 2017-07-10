<?php

namespace App\Repositories\PDO;

use App\Repositories\Contracts\PDORow;

class UrlRepository implements \App\Repositories\Contracts\UrlRepository
{

    /**
     * The PDO connection.
     *
     * @var \PDO
     */
    private $connection;

    /**
     * UrlRepository constructor.
     */
    public function __construct()
    {
        $this->connection = new \PDO('mysql:host=' . config()['database']['host'] . ';dbname=' . config()['database']['name'] . '', config()['database']['user'], config()['database']['pass']);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Store the provided URL with the given slug.
     *
     * @param $url
     * @param $slug
     * @return PDORow
     */
    public function store($url, $slug)
    {
        $statement = $this->connection->prepare('INSERT INTO urls (redirect_to, slug, created_at) VALUES (:url, :slug, :created_at)');

        $date = date('Y-m-d H:i:s');

        $statement->bindParam(':url', $url, \PDO::PARAM_STR);
        $statement->bindParam(':slug', $slug, \PDO::PARAM_STR);
        $statement->bindParam(':created_at', $date, \PDO::PARAM_STR);

        $statement->execute();

        return $this->find($slug);
    }

    /**
     * See if a URL exists with the given slug.
     *
     * @param $slug
     * @return bool
     */
    public function exists($slug)
    {
        $statement = $this->connection->prepare('SELECT id FROM urls WHERE slug = :slug');
        $statement->bindParam(':slug', $slug, \PDO::PARAM_STR);
        $statement->execute();

        return (bool) $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Find a URL from storage by the given slug.
     *
     * @param $slug
     * @return null|PDORow
     */
    public function find($slug)
    {
        $statement = $this->connection->prepare('SELECT * FROM urls WHERE slug = :slug');
        $statement->bindParam(':slug', $slug, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Increment the number of visits on a given shortened URL.
     *
     * @param $slug
     * @return void
     */
    public function addVisit($slug)
    {
        $statement = $this->connection->prepare('UPDATE urls SET visits = visits + 1 WHERE slug = :slug');
        $statement->bindParam(':slug', $slug, \PDO::PARAM_STR);
        $statement->execute();
    }
    
}