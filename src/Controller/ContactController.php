<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Contact/index.html.twig');
    }
    public function add(): string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat = array_map('trim', $_POST);

            if (empty($cat['lastname'])) {
                $errors[] = "Le nom est obligatoire";
            }

            $maxNameLength = 100;
            if (strlen($cat['lastname']) > $maxNameLength) {
                $errors[] = "Le nom doit faire moins de " . $maxNameLength;
            }


            if (empty($cat['firstname'])) {
                $errors[] = "Le prénom est obligatoire";
            }

            $maxNameLength = 100;
            if (strlen($cat['firstname']) > $maxNameLength) {
                $errors[] = "Le prénom doit faire moins de " . $maxNameLength;
            }



            if (empty($cat['tel'])) {
                $errors[] = "Le numéro de téléphone est obligatoire";
            }

            if (empty($cat['email'])) {
                $errors[] = "L'adresse mail est obligatoire";
            }
        }
        return $this->twig->render('Contact/Controller/index.html.twig', ['errors' => $errors, 'cat' => $cat]);
    }
}
