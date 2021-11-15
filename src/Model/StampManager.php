<?php

namespace App\Model;

class StampManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function insert(array $cat): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (lastname, firstname, tel, email, subject) 
        VALUES (:lastname, :firstname, :tel, :email, :subject)");
        $statement->bindValue('title', $cat['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('title', $cat['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('title', $cat['tel'], \PDO::PARAM_STR);
        $statement->bindValue('title', $cat['email'], \PDO::PARAM_STR);
        $statement->bindValue('title', $cat['subject'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
