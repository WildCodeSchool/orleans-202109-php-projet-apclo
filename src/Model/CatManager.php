<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function toAdopt()
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE adoption_date IS NULL ORDER BY id ASC LIMIT 3";

        return $this->pdo->query($query)->fetchAll();
    }
}
