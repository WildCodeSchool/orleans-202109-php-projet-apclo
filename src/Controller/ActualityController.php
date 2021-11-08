<?php

namespace App\Controller;

use App\Model\ActualityManager;

class ActualityController extends AbstractController
{
    public function index()
    {
        $actualityManager = new ActualityManager();
        $actualities = $actualityManager->selectAll($orderBy="date",$direction='DESC');
        return $this->twig->render('Actualities/index.html.twig', ['actualities' => $actualities]);
    }
}