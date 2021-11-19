<?php

namespace App\Controller;

use App\Model\ActualityManager;

class AdminActualityController extends AbstractController
{
    public function index(): string
    {
        $actualityManager = new ActualityManager();
        $actualities = $actualityManager->selectAll('date', 'DESC');

        return $this->twig->render('Admin/Actuality/index.html.twig', ['actualities' => $actualities]);
    }

    public function add(): string
    {
        $errors = $actuality = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $actuality = array_map('trim', $_POST);

            $errors = $this->actualityValidate($actuality);

            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $maxFileSize = '2000000';
                if ($_FILES['image']['size'] > $maxFileSize) {
                    $errors[] = 'Le fichier doit faire moins de ' . $maxFileSize / 1000000 . 'M';
                }

                $authorizedMimes = ['image/jpeg', 'image/png'];
                $fileMime = mime_content_type($_FILES['image']['tmp_name']);
                if (!in_array($fileMime, $authorizedMimes)) {
                    $errors[] = 'Le type mime doit être parmi ' . implode(', ', $authorizedMimes);
                }
            } else {
                $errors[] = 'Problème d\'upload';
            }
            if (empty($errors)) {
                $fileName = uniqid() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $fileName);
                $actuality['image'] = $fileName;
                $actualityManager = new ActualityManager();
                $actualityManager->insert($actuality);
                header('Location:/admin/actualites/index');
            }
        }

        return $this->twig->render('Admin/Actuality/add.html.twig', ['errors' => $errors, 'actuality' => $actuality]);
    }

    public function edit(int $id): string
    {
        $errors = $actuality = [];

        $actualityManager = new ActualityManager();
        $actuality = $actualityManager->selectOneById($id);
        $previousImage = $actuality['image'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $maxFileSize = '2000000';
                if ($_FILES['image']['size'] > $maxFileSize) {
                    $errors[] = 'Le fichier doit faire moins de ' . $maxFileSize / 1000000 . 'M';
                }

                $authorizedMimes = ['image/jpeg', 'image/png'];
                $fileMime = mime_content_type($_FILES['image']['tmp_name']);
                if (!in_array($fileMime, $authorizedMimes)) {
                    $errors[] = 'Le type mime doit être parmi ' . implode(', ', $authorizedMimes);
                }
            } else {
                $errors[] = 'Problème d\'upload';
            }

            $actuality = array_map('trim', $_POST);
            $actuality['id'] = $id;
            $actuality['image'] = $previousImage;

            $errors = $this->actualityValidate($actuality);

            if (empty($errors) && !empty($_FILES['image']['name'])) {
                unlink('uploads/' . $previousImage);
                $fileName = uniqid() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $fileName);
                $actuality['image'] = $fileName;
            }

            if (empty($errors)) {
                $actualityManager = new ActualityManager();
                $actualityManager->update($actuality);
                header('Location:/admin/actualites/index');
            }
        }

        return $this->twig->render('Admin/Actuality/edit.html.twig', ['errors' => $errors, 'actuality' => $actuality]);
    }

    private function actualityValidate(array $actuality): array
    {
        $errors = [];

        if (empty($actuality['title'])) {
            $errors[] = 'Le champ titre est obligatoire';
        }
        $maxTitleLength = 255;
        if (strlen($actuality['title']) > $maxTitleLength) {
            $errors[] = 'Le titre doit faire moins de ' . $maxTitleLength . ' caractères.';
        }
        if (empty($actuality['date'])) {
            $errors[] = 'Le champ date est obligatoire';
        }
        $dateInfos = explode("-", $actuality['date']);
        if (!checkdate((int)$dateInfos[1], (int)$dateInfos[2], (int)$dateInfos[0])) {
            $errors[] = 'Le format date n\'est pas valide';
        }
        if (empty($actuality['description'])) {
            $errors[] = 'La description est obligatoire';
        }

        return $errors;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $actualityManager = new ActualityManager();
            $actuality = $actualityManager->selectOneById((int)$id);
            if (file_exists('uploads/' . $actuality['image'])) {
                unlink('uploads/' . $actuality['image']);
            }

            $actualityManager->delete((int)$id);
            header('Location:/admin/actualites/index');
        }
    }
}
