<?php

namespace App\Model;

class GenderManager extends AbstractManager
{
    public const TABLE = 'gender';
    public function selectAllGenders()
    {
        $query = "SELECT * FROM " . self::TABLE;

        return $this->pdo->query($query)->fetchAll();
    }
}
