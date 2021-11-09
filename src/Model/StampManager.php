<?php

namespace App\Model;

class Stampmanager extends AbstractManager
{
    public const TABLE = 'stamp';

     /**
     * Insert new stamp in database
     */
    public function insert(array $stamp): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (lastname, firstname, tel, email, subject) VALUES (:lastname, :firstname, :tel, :email, :subject)");
        $statement->bindValue('lastname', $stamp['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('firstname', $stamp['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('tel', $stamp['tel'], \PDO::PARAM_STR);
        $statement->bindValue('email', $stamp['email'], \PDO::PARAM_STR);
        $statement->bindValue('subject', $stamp['subject'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}