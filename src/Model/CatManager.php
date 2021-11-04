<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function selectAllCats(): array
    {
        $query = "SELECT cat.name as name, image, birth_date, gender.name as gender FROM " .
        self::TABLE . " JOIN gender ON gender.id = cat.gender_id";
        return $this->pdo->query($query)->fetchAll();
    }
}
