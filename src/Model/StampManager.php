<?php

namespace App\Model;

use OndraM\CiDetector\Ci\AbstractCi;

class StampManager extends AbstractManager
{
    public const TABLE = 'stamp';

    public function insert(array $stamp): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (lastname, firstname, tel, email, subject) VALUES (:lastname, :firstname, :tel, :email, :subject)");
        $statement->bindValue('title', $stamp['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('title', $stamp['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('title', $stamp['tel'], \PDO::PARAM_STR);
        $statement->bindValue('title', $stamp['email'], \PDO::PARAM_STR);
        $statement->bindValue('title', $stamp['subject'], \PDO::PARAM_STR);
        

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}