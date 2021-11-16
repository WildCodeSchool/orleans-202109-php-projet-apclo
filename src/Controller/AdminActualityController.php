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
                $errors[] = 'Le champ titre est obligatoire';
            }
            $maxTitleLength = 255;
            if (strlen($actuality['title']) > $maxTitleLength) {
                $errors[] = 'Le titre doit faire moins de ' . $maxTitleLength . ' caractères.';
            }
            if (empty($actuality['date'])) {
                $errors[] = 'Le champ date est obligatoire';
            }
            $dateInfos = explode("-", $actuality['date']);
            if (!checkdate((int)$dateInfos[1], (int)$dateInfos[2], (int)$dateInfos[0])) {
                $errors[] = 'Le format date n\'est pas valide';
            }
            if (empty($actuality['description'])) {
                $errors[] = 'La description est obligatoire';
            }

            if (empty($errors)) {
                $actualityManager = new ActualityManager();
                $actualityManager->insert($actuality);
                header('Location:/admin/actualités/index');
            }
        }

        return $this->twig->render('Admin/Actuality/add.html.twig', ['errors' => $errors, 'actuality' => $actuality]);
    }
}
