<?php

namespace App\Controller;

use App\Model\MemberManager;

class AssociationController extends AbstractController
{
    public function index()
    {
        $memberManager = new MemberManager();
        $members = $memberManager->selectAll();

        return $this->twig->render('Association/index.html.twig', ['members'=>$members]);
    }
}
