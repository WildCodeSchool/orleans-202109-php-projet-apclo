<?php

namespace App\Controller;

use App\Model\Stampmanager;

class AdminStampController extends AbstractController
{
    /**
     * List stamp
     */
    public function index(): string
    {
        $stampManager = new Stampmanager();
        $stamps = $stampManager->selectAll();

        return $this->twig->render('Admin/Stamp/index.html.twig', ['stamps' => $stamps]);
    }

    public function add(): string
    {
        $errors = [];

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

            if (empty($stamp['subject'])) {
                $errors[] = "Le champ est obligatoire";
            }


            /*if(empty($errors)) {
                $stampManager = new Stampmanager();
                $stampManager->insert($stamp);
                header('Location: /items/show?id=' . $id)
            }*/



            // if validation is ok, update and redirection
            //$itemManager->update($item);
            //header('Location: /items/show?id=' . $id);
        }

        return $this->twig->render('Contact/Controller/index.html.twig', ['errors' => $errors]);
    }
}
