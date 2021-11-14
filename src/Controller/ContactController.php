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

        $errors = $stamp = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stamp = array_map('trim', $_POST);

            if (empty($stamp['lastname'])) {
                $errors[] = "Le nom est obligatoire";
            }

            if (empty($stamp['firstname'])) {
                $errors[] = "Le prénom est obligatoire";
            }

            if (empty($stamp['tel'])) {
                $errors[] = "Le numéro de téléphone est obligatoire";
            }

            if (empty($stamp['email'])) {
                $errors[] = "L'adresse mail est obligatoire";
            }
        }
        return $this->twig->render('Contact/Controller/index.html.twig', ['errors' => $errors, 'stamp' => $stamp]);
    }
}
