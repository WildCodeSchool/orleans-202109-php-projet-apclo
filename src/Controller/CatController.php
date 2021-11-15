<?php

namespace App\Controller;

use App\Model\CatManager;

class CatController extends AbstractController
{
    public function index(): string
    {
        $filters = array_map('trim', $_GET);
        $catManager = new CatManager();
        $cats = $catManager->selectAllCats($filters);

        return $this->twig->render('Cats/index.html.twig', ['cats' => $cats]);
    }

    public function show(int $id): string
    {
        $catManager = new CatManager();
        $cat = $catManager->selectOneById($id);
        return $this->twig->render('Cat/show.html.twig', ['cat' => $cat]);
    }
}
