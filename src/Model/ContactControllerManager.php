<?php

namespace App\Model;

use App\Controller\AbstractController;

class ContactControllerManager extends AbstractController
{
    public const TABLE = 'cat';
    
    public function insert(array $contact): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (lastname, firstname, tel, email, subject) 
    VALUES (:lastname, :firstname, :tel, :email, :subject)");
        $statement->bindValue('lastname', $contact['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('firstname', $contact['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('tel', $contact['tel'], \PDO::PARAM_STR);
        $statement->bindValue('email', $contact['email'], \PDO::PARAM_STR);
        $statement->bindValue('subject', $contact['subject'], \PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
