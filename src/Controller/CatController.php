<?php

namespace App\Controller;

use App\Model\CatManager;

class CatController extends AbstractController
{
    public function index()
    {
        $catManager = new CatManager();
        $adoptedCats = $catManager->latestAdopted();

        return $this->twig->render('Home/index.html.twig', ['adoptedCats' => $adoptedCats]);
    }
}
