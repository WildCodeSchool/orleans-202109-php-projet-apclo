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
        $errors = $actuality = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $actuality = array_map('trim', $_POST);

            if (empty($actuality['title'])) {
                $errors[] = 'Le champs titre est obligatoire';
            }
            $maxTitleLength = 255;
            if (strlen($actuality['title']) > $maxTitleLength) {
                $errors[] = 'Le titre doit faire moins de' . $maxTitleLength . 'caractères.';
            }
            if (empty($actuality['date'])) {
                $errors[] = 'Le champs date est obligatoire';
            }
            if (empty($actuality['description'])) {
                $errors[] = 'La description est obligatoire'; 
            }

            if(empty($errors)) {
                $actualityManager = new ActualityManager();
                $actualityManager->insert($actuality);
                header('Location:/admin/actualités/index');
            }
        }

        return $this->twig->render('Admin/Actuality/add.html.twig', ['errors'=> $errors, 'actuality' => $actuality]);
    }

    public function edit(int $id): string
    {
        $errors = $actuality = [];
        /*$itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $itemManager->update($item);
            header('Location: /items/show?id=' . $id);
        }*/

        return $this->twig->render('Admin/Actuality/edit.html.twig', ['errors'=> $errors, 'actuality' => $actuality]);
    }
}
