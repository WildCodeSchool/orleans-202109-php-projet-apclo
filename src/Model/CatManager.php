<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';
    
    public function toAdopt()
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE adoption_date IS NULL ORDER BY id DESC LIMIT 3";
        
        return $this->pdo->query($query)->fetchAll();
    }

    public function selectAllCats(): array
    {
        $query = "SELECT cat.name as name, image, birth_date, gender.name as gender FROM " .
            self::TABLE . " JOIN gender ON gender.id = cat.gender_id";
        return $this->pdo->query($query)->fetchAll();
    }

    public function latestAdopted()
    {
        $query = "SELECT * FROM " . self::TABLE .
            " WHERE adoption_date IS NOT NULL 
            ORDER BY adoption_date DESC LIMIT 3";

        return $this->pdo->query($query)->fetchAll();
    }
}
