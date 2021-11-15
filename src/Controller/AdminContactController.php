<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\CatManager;

class ContactManagerAdmin extends AbstractController
{
    public function add(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat = array_map('trim', $_POST);

            if (empty($cat['lastname'])) {
                $errors[] = "Le nom est obligatoire";
            }
            $maxLastNameLength = 100;
            if (strlen($cat['lastname']) > $maxLastNameLength) {
                $errors[] = "Le nom doit faire moins de " . $maxLastNameLength;
            }
            if (empty($cat['firstname'])) {
                $errors[] = "Le prénom est obligatoire";
            }
            $maxFirstNameLength = 100;
            if (strlen($cat['firstname']) > $maxFirstNameLength) {
                $errors[] = "Le prénom doit faire moins de " . $maxFirstNameLength;
            }
            if (empty($cat['tel'])) {
                $errors[] = "Le numéro de téléphone est obligatoire";
            }
            $maxTelNumberLength = 10;
            if (strlen($cat['tel']) > $maxTelNumberLength) {
                $errors[] = "Le champ doit faire moins de " . $maxTelNumberLength;
            }
            if (empty($cat['email'])) {
                $errors[] = "L'adresse mail est obligatoire";
            }
            $maxEmailNumberLength = 255;
            if (!filter_var($cat['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Le champ doit faire moins de " . $maxEmailNumberLength;
            }
            if (empty($errors)) {
                $catManager = new CatManager();
                $catManager->insert($cat);
                header('Location:/admin/Contact/index');
            }
        }
        return $this->twig->render('View/Contact/index.html.twig', ['errors' => $cat, 'cat']);
    }
}
