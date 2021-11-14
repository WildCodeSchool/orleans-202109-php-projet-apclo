<?php
namespace App\Controller;
class AssociationController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Association/index.html.twig');
    }
}