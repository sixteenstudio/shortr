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
        return new Response('', view()->render('home/index.php'), 200);
    }

}