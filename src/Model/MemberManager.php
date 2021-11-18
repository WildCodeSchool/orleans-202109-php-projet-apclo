<?php

namespace App\Model;

class MemberManager extends AbstractManager
{
    public const TABLE = 'member';

    public function insert(array $member): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
        " (`lastname`,`firstname`,`gender`,`job`,`image`) VALUES (:lastname, :firstname, :gender, :job, :image)");
        $statement->bindValue('lastname', $member['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('firstname', $member['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('gender', $member['gender'], \PDO::PARAM_STR);
        $statement->bindValue('job', $member['job'], \PDO::PARAM_STR);
        $statement->bindValue('image', $member['image'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
