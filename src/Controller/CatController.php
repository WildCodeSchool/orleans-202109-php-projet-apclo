<?php

namespace App\Controller;

use App\Model\CatManager;
use App\Model\GenderManager;

class CatController extends AbstractController
{
    public function index(): string
    {
        $filters = array_map('trim', $_GET);
        $catManager = new CatManager();
        $genderManager = new GenderManager();
        $cats = $catManager->selectAllCats($filters);
        $genders = $genderManager->selectAllGenders();
        $ages = $catManager->selectAllAges();

        return $this->twig->render(
            'Cats/index.html.twig',
            [
                'cats' => $cats,
                'catGender' => $filters['catGender'] ?? '',
                'catAge' => $filters['catAge'] ?? '',
                'genders' => $genders,
                'ages' => $ages
            ]
        );
    }

    public function show(int $id): string
    {
        $catManager = new CatManager();
        $cat = $catManager->selectOneById($id);
        return $this->twig->render('Cat/show.html.twig', ['cat' => $cat]);
    }
}
