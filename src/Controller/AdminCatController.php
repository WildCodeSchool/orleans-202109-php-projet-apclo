<?php

namespace App\Controller;

use App\Model\CatManager;
use App\Model\AdminBreedManager;
use App\Model\AdminColorManager;
use App\Model\AdminFurrManager;
use App\Model\AdminGenderManager;

class AdminCatController extends AbstractController
{
    public function edit(int $id): string
    {
        $errors = $cat = [];
        $catManager = new catManager();
        $cat = $catManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat = array_map('trim', $_POST);
            $cat['id'] = $id;

            $errors = $this->catValidate($cat);

            if (empty($errors)) {
                $catManager->update($cat);
                header('Location: /chats/show?id=' . $id);
            }
        }

        $adminBreedManager = new AdminBreedManager();
        $breeds = $adminBreedManager->selectAll();

        $adminColorManager = new AdminColorManager();
        $colors = $adminColorManager->selectAll();

        $adminFurrManager = new AdminFurrManager();
        $furrs = $adminFurrManager->selectAll();

        $adminGenderManager = new AdminGenderManager();
        $genders = $adminGenderManager->selectAll();

        return $this->twig->render('Admin/Cat/edit.html.twig', [
            'errors' => $errors, 'cat' => $cat,
            'breeds' => $breeds, 'colors' => $colors, 'furrs' => $furrs, 'genders' => $genders,
        ]);
    }

    private function catValidate(array $cat): array
    {
        $errors = [];
        if (empty($cat['name'])) {
            $errors[] = "Le champ nom est obligatoire";
        }

        $maxNameLength = 100;
        if (strlen($cat['name']) > $maxNameLength) {
            $errors[] = "Le nom dépasse les 100 caractères";
        }

        if (empty($cat['birth_date'])) {
            $errors[] = "Le champ date de naissance est obligatoire";
        }

        if (empty($cat['description'])) {
            $errors[] = "Le champ description est obligatoire";
        }
        return $errors;
    }
}
