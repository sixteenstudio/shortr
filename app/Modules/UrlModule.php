<?php
/**
 * Created by PhpStorm.
 * User: matthewcollison
 * Date: 10/07/2017
 * Time: 02:10
 */

namespace App\Modules;


use App\Repositories\Contracts\UrlRepository;
use App\Response;

class UrlModule
{

    public function myUrls()
    {
        $messages = '';
        if (isset($_SESSION['messages'])) {
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
        }

        $this->updateUrls();

        $myUrls = isset($_SESSION['myUrls']) ? $_SESSION['myUrls'] : [];

        return new Response([], view()->render('urls/my-urls.php', ['myUrls' => $myUrls, 'messages' => $messages]));
    }

    public function redirect($slug)
    {
        $urlRepository = app()->make(UrlRepository::class);

        if ( ! $urlRepository->exists($slug)) {
            app()->abort(404);
        }

        $url = $urlRepository->find($slug);
        $urlRepository->addVisit($slug);

        return new Response(['Location: ' . $url['redirect_to']], '', 301);
    }

    protected function updateUrls()
    {
        $urlRepository = app()->make(UrlRepository::class);

        foreach ($_SESSION['myUrls'] as &$myUrl) {
            $myUrl = $urlRepository->find($myUrl['slug']);
        }
    }

}