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
            $contact = array_map('trim', $_POST);
            $errors = $this->validate($contact);
            if (empty($errors)) {
                header('Location:/admin/Contact/index');
            }
        }
        return $this->twig->render('View/Contact/index.html.twig', ['errors' => $errors, 'cat']);
    }

    /**
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    private function validate(array $contact): array
    {
        $errors = [];
        if (empty($contact['lastname'])) {
            $errors[] = "Le nom est obligatoire";
        }
        $maxLastNameLength = 100;
        if (strlen($contact['lastname']) > $maxLastNameLength) {
            $errors[] = "Le nom doit faire moins de " . $maxLastNameLength;
        }
        if (empty($contact['firstname'])) {
            $errors[] = "Le prénom est obligatoire";
        }
        $maxFirstNameLength = 100;
        if (strlen($contact['firstname']) > $maxFirstNameLength) {
            $errors[] = "Le prénom doit faire moins de " . $maxFirstNameLength;
        }
        if (empty($contact['tel'])) {
            $errors[] = "Le numéro de téléphone est obligatoire";
        }
        $maxTelNumberLength = 10;
        if (strlen($contact['tel']) > $maxTelNumberLength) {
            $errors[] = "Le champ doit faire moins de " . $maxTelNumberLength;
        }
        if (empty($contact['email'])) {
            $errors[] = "L'adresse mail est obligatoire";
        }
        if (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Le format d'email est incorrect";
        }
        $maxEmailNumberLength = 255;
        if (strlen($contact['email'])) {
            $errors[] = "L'adresse mail doit faire moins de " . $maxEmailNumberLength;
        }
        return $errors;
    }
}
