<?php

namespace App\Controller;

use App\Model\CatManager;

class AdminCatController extends AbstractController
{
    /*public function edit(int $id): string
    {
        $error = $cat = [];
        /*$catManager = new catManager();
        $item = $Manager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $itemManager->update($item);
            header('Location: /items/show?id=' . $id);
        }

        return $this->twig->render('Admin/Cat/edit.html.twig', [ 'error' => $error,
            'cat' => $cat,
        ]);
    }*/
}
