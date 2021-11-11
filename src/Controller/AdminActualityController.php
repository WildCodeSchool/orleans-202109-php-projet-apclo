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

    public function add(): string
    {
        /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $itemManager = new ItemManager();
            $id = $itemManager->insert($item);
            header('Location:/items/show?id=' . $id);
        }*/

        return $this->twig->render('Admin/Actuality/add.html.twig');
    }
}
