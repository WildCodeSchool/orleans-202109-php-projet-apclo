<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    public function index()
    {
        $cat = [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $cat = array_map('trim', $_GET);
        }

        return $this->twig->render('Contact/index.html.twig', ['cat' => $cat]);
    }
}
