<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

   /* public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " .
        self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }*/
}
