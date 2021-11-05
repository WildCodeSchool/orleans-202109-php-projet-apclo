<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ActualityManager;
use App\Model\CatManager;

class HomeController extends AbstractController
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
        $actualityManager = new ActualityManager();
        $article = $actualityManager->showLastArticle();

        $catManager = new CatManager();
        $adoptions = $catManager->toAdopt();
        $adoptedCats = $catManager->latestAdopted();

        return $this->twig->render('Home/index.html.twig', [
            'adoptions' => $adoptions,
            'adoptedCats' => $adoptedCats,
            'article' => $article,
        ]);
    }
}
