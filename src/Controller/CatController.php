<?php

namespace App\Controller;

use App\Model\CatManager;

class CatController extends AbstractController
{
    public function index()
    {
        $catManager = new CatManager();
        $adoptions = $catManager->toAdopt();

        return $this->twig->render('Home/index.html.twig', ['adoptions' => $adoptions]);
    }
}
