<?php

namespace App\Model;

class ActualityManager extends AbstractManager
{
    public const TABLE = 'article';

    public function showLastArticle()
    {
        $query = " SELECT * FROM " . self::TABLE . " ORDER BY date DESC LIMIT 1 ";

        return $this->pdo->query($query)->fetch();
    }

    public function insert(array $actuality): int
    {
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE . " (`title`, `date`, `description`)
            VALUES (:title, :date, :description)"
        );
        $statement->bindValue('title', $actuality['title'], \PDO::PARAM_STR);
        $statement->bindValue('date', $actuality['date']);
        $statement->bindValue('description', $actuality['description'], \PDO::PARAM_STR);

        $statement->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $actuality): bool
    {
        $statement = $this->pdo->prepare(
            "UPDATE " . self::TABLE . " SET `title` = :title, `date` = :date, `description` = :description WHERE id=:id"
        );
        $statement->bindValue('id', $actuality['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $actuality['title'], \PDO::PARAM_STR);
        $statement->bindValue('date', $actuality['date']);
        $statement->bindValue('description', $actuality['description'], \PDO::PARAM_STR);

        return $statement->execute();
    }
}
