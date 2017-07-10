<?php

namespace App\Modules;

use App\Response;

class HomeModule
{

    /**
     * Show the homepage.
     *
     * @return Response
     */
    public function index()
    {
        $data = [];

        if ( ! empty($_SESSION['errors'])) {
            $data['errors'] = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        if ( ! empty($_SESSION['urlInput'])) {
            $data['urlInput'] = $_SESSION['urlInput'];
            unset($_SESSION['urlInput']);
        }

        return new Response([], view()->render('home/index.php', $data), 200);
    }

    /**
     * Show the homepage.
     *
     * @return Response
     */
    public function create()
    {
        $url = isset($_POST['url']) ? $_POST['url'] : '';

        $hasErrors = false;

        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            $_SESSION['errors'] = 'Please enter a valid URL.';
            $hasErrors = true;
        }

        if (empty($url)) {
            $_SESSION['errors'] = 'You forgot to enter a URL.';
            $hasErrors = true;
        }

        if ($hasErrors) {
            return $this->errorRedirect();
        }

        $urlShortened = false;

        if ( ! $urlShortened) {
            $_SESSION['errors'] = 'Sorry, something went wrong when trying to shorten your URL!';
            return $this->errorRedirect();
        } else {
            $_SESSION['messages'] = 'New URL created!';
            return new Response(['Location: /my-urls'], '', 302);
        }
    }

    /**
     * Produce an error redirect.
     *
     * @return Response
     */
    protected function errorRedirect()
    {
        $_SESSION['urlInput'] = $url;
        return new Response(['Location: /'], '', 302);
    }

}