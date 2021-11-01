<?php

namespace App\Controller;

class OurCatsController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Cats/index.html.twig');
    }
}
