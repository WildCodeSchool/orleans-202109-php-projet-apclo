<?php

namespace App\Controller;

use App\Model\ActualityManager;

class AdminActualityController extends AbstractController
{
    public function index(): string
    {
        $actualityManager = new ActualityManager();
        $actualities = $actualityManager->selectAll('date', 'DESC');

        return $this->twig->render('Admin/Actuality/index.html.twig', ['actualities' => $actualities]);
    }
}
