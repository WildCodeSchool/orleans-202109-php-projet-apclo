<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        return $this->twig->render('Contact/index.html.twig');
    }

    public function thanks()
    {
        return $this->twig->render('Contact/thanks.php');
    }
}
