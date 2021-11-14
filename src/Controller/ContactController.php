<?php

namespace App\Controller;

class ContactController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        return $this->twig->render('Contact/index.html.twig');
    }
    public function add(): string
    {
        $errors = $stamp = [] ;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stamp = array_map('trim', $_POST);
            // TODO validations (length, format...)
            if (empty($stamp['lastname'])) {
                $errors[] = "Le nom est obligatoire";
            }
            $maxNameLength = 255;
            if (strlen($stamp['lastname']) > $maxNameLength) {
                $errors[] = "Le nom doit faire moins de " . $maxNameLength;
            }
            if (empty($stamp['firstname'])) {
                $errors[] = "Le prénom est obligatoire";
            }
            $maxNameLength = 255;
            if (strlen($stamp['firstname']) > $maxNameLength) {
                $errors[] = "Le prénom doit faire moins de " . $maxNameLength;
            }
            if (empty($stamp['tel'])) {
                $errors[] = "Le numéro de téléphone est obligatoire";
            }
            $maxNameLength = 10;
            if (strlen($stamp['tel']) > $maxNameLength) {
                $errors[] = "Le champ doit faire moins de " . $maxNameLength;
            }
            if (empty($stamp['email'])) {
                $errors[] = "L'adresse mail est obligatoire";
            }
            $maxNameLength = 255;
            if (!filter_var($stamp['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Le champ doit faire moins de " . $maxNameLength;
            }
        }
        return $this->twig->render('Contact/Controller/index.html.twig', ['errors' => $errors, 'stamp' => $stamp]);
    }
}