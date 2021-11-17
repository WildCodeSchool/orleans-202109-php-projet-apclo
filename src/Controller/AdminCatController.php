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

        $adminBreedManager = new AdminBreedManager();
        $breeds = $adminBreedManager->selectAll();

        $adminColorManager = new AdminColorManager();
        $colors = $adminColorManager->selectAll();

        $adminFurrManager = new AdminFurrManager();
        $furrs = $adminFurrManager->selectAll();

        $adminGenderManager = new AdminGenderManager();
        $genders = $adminGenderManager->selectAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cat = array_map('trim', $_POST);
            $cat['id'] = $id;

            $errors = $this->catValidate($cat, $genders, $colors, $furrs, $breeds);

            if (empty($errors)) {
                $catManager->update($cat);
                header('Location: /chats/show?id=' . $id);
            }
        }

        return $this->twig->render('Admin/Cat/edit.html.twig', [
            'errors' => $errors, 'cat' => $cat,
            'breeds' => $breeds, 'colors' => $colors, 'furrs' => $furrs, 'genders' => $genders,
        ]);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    private function catValidate(array $cat, array $genders, array $colors, array $furrs, array $breeds): array
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

        if (empty($cat['gender_id'])) {
            $errors[] = "Le champ genre est obligatoire";
        }

        if (!in_array($cat['gender_id'], array_column($genders, 'id'))) {
            $errors[] = "Merci de choisir un genre correct";
        }

        if (empty($cat['color_id'])) {
            $errors[] = "Le champ couleur est obligatoire";
        }

        if (!in_array($cat['color_id'], array_column($colors, 'id'))) {
            $errors[] = "Merci de choisir une couleur correcte";
        }

        if (empty($cat['furr_id'])) {
            $errors[] = "Le champ poil est obligatoire";
        }

        if (!in_array($cat['furr_id'], array_column($furrs, 'id'))) {
            $errors[] = "Merci de choisir un poil correct";
        }

        if (empty($cat['breed_id'])) {
            $errors[] = "Le champ race est obligatoire";
        }

        if (!in_array($cat['breed_id'], array_column($breeds, 'id'))) {
            $errors[] = "Merci de choisir une race correcte";
        }

        $date = explode('-', $cat['birth_date']);

        if (!checkdate((int)$date[1], (int)$date[2], (int)$date[0])) {
            $errors[] = 'Le champ date n\'est pas valide';
        }

        return $errors;
    }

    public function index(): string
    {
        $catManager = new CatManager();
        $cats = $catManager->selectAllCats();
        return $this->twig->render('Admin/Cat/index.html.twig', ['cats' => $cats]);
    }
}
