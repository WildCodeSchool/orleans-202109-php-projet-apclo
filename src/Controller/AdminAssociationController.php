<?php

namespace App\Controller;

use App\Model\MemberManager;

class AdminAssociationController extends AbstractController
{
    public function index()
    {
        $memberManager = new MemberManager();
        $members = $memberManager->selectAll();

        return $this->twig->render('Admin/Association/index.html.twig', ['members' => $members]);
    }
}
