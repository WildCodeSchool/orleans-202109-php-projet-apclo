<?php

namespace App\Controller;

use App\Model\MemberManager;

class AdminAssociationController extends AbstractController
{
    public function index()
    {
        $memberManager = new MemberManager();
        $members = $memberManager->selectAll();

        return $this->twig->render('Admin/Association/index.html.twig', ['members' => $members]);
    }

    public function add()
    {
        $errors = $uploadedErrors = $member = [];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedErrors = $this->uploadValidate($member);

            $member = array_map('trim', $_POST);

            if (!empty($_FILES['image']) && empty($uploadedErrors)) {
                $fileName = uniqid() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $fileName);
                $member['image'] = $fileName;
            }

            $errors = $this->memberValidate($member);

            if (empty($errors) && empty($uploadedErrors)) {
                $memberManager = new MemberManager();
                $memberManager->insert($member);
                header('Location: /admin/membres');
            }
        }
        return $this->twig->render('Admin/Association/add.html.twig', [
            'uploadedErrors' => $uploadedErrors,
            'errors' => $errors, 'member' => $member
        ]);
    }

    private function memberValidate(array $member): array
    {
        $errors = [];
        if (empty($member['lastname'])) {
            $errors[] = "Le champ nom est obligatoire";
        }

        $maxNameLength = 100;
        if (strlen($member['lastname']) > $maxNameLength) {
            $errors[] = "Le nom dépasse les 100 caractères";
        }

        if (empty($member['firstname'])) {
            $errors[] = "Le champ prénom est obligatoire";
        }

        $maxNameLength = 100;
        if (strlen($member['firstname']) > $maxNameLength) {
            $errors[] = "Le prénom dépasse les 100 caractères";
        }

        if (empty($member['gender'])) {
            $errors[] = "Le champ civilité est obligatoire";
        }

        if (empty($member['job'])) {
            $errors[] = "Le champ rôle est obligatoire";
        }

        $maxNameLength = 100;
        if (strlen($member['job']) > $maxNameLength) {
            $errors[] = "Le champ rôle dépasse les 100 caractères";
        }

        return $errors;
    }

    private function uploadValidate(array $member): array
    {
        $errors = [];

        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            $maxFileSize = '2000000';
            if ($_FILES['image']['size'] > $maxFileSize) {
                $errors[] = 'Le fichier doit faire moins de ' . $maxFileSize / 1000000 . 'M';
            }

            $authorizesMimes = ['image/jpeg', 'image/png'];
            $fileMime = mime_content_type($_FILES['image']['tmp_name']);

            if (!in_array($fileMime, $authorizesMimes)) {
                $errors[] = 'Le type de mime doit être parmi : ' . implode(',', $authorizesMimes);
            }
        } elseif (!is_uploaded_file($_FILES['image']['tmp_name']) && empty($member['image'])) {
            $errors[] = 'Problème d\'upload';
        }
        return $errors;
    }
}
