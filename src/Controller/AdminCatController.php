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
        $errors = $uploadedErrors = $cat = [];

        $catManager = new catManager();
        $cat = $catManager->selectOneById($id);
        $previousImage = $cat['image'];

        $adminBreedManager = new AdminBreedManager();
        $breeds = $adminBreedManager->selectAll();

        $adminColorManager = new AdminColorManager();
        $colors = $adminColorManager->selectAll();

        $adminFurrManager = new AdminFurrManager();
        $furrs = $adminFurrManager->selectAll();

        $adminGenderManager = new AdminGenderManager();
        $genders = $adminGenderManager->selectAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedErrors = $this->uploadValidate($cat);

            $cat = array_map('trim', $_POST);
            $cat['id'] = $id;
            $cat['image'] = $previousImage;

            if (!empty($_FILES['image']) && empty($uploadedErrors)) {
                $fileName = uniqid() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $fileName);
                $cat['image'] = $fileName;
            }

            $errors = $this->catValidate($cat, $genders, $colors, $furrs, $breeds);

            if (empty($errors) && empty($uploadedErrors)) {
                $catManager->update($cat);
                header('Location: /admin/chats');
            }
        }

        return $this->twig->render('Admin/Cat/edit.html.twig', [
            'uploadedErrors' => $uploadedErrors,
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

    private function uploadValidate(array $cat): array
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
        } elseif (!is_uploaded_file($_FILES['image']['tmp_name']) && empty($cat['image'])) {
            $errors[] = 'Problème d\'upload';
        }
        return $errors;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $catManager = new catManager();
            $cat = $catManager->selectOneById((int) $id);
            if (file_exists('uploads/' . $cat['image'])) {
                unlink('uploads/' . $cat['image']);
            }

            $catManager->delete((int)$id);
            header('Location:/admin/chats/index');
        }
    }
}
