<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function latestAdopted()
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE adoption_date IS NOT NULL ORDER BY adoption_date DESC LIMIT 3";

        return $this->pdo->query($query)->fetchAll();
    }
}
