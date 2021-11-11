<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT cat.name name, image, birth_date date,
        TIMESTAMPDIFF(YEAR, birth_date, NOW()) as age,
        digital_chip, description, adoption_date, gender.name gender, furr.length length,
        color.name color, breed.name breed 
        FROM " . self::TABLE .
        "   LEFT JOIN gender ON gender.id = cat.gender_id 
            LEFT JOIN furr ON furr.id = cat.furr_id
            LEFT JOIN breed ON breed.id = cat.breed_id 
            LEFT JOIN color ON color.id = cat.color_id 
        WHERE cat.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function toAdopt()
    {
        $query = "SELECT * FROM " . self::TABLE . " WHERE adoption_date IS NULL ORDER BY id DESC LIMIT 3";

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectAllCats(): array
    {
        $query = "SELECT cat.name as name, image, birth_date, gender.name as gender, cat.id as id FROM " .
        self::TABLE . " JOIN gender ON gender.id = cat.gender_id";

        return $this->pdo->query($query)->fetchAll();
    }

    public function latestAdopted()
    {
        $query = "SELECT * FROM " . self::TABLE .
            " WHERE adoption_date IS NOT NULL 
            ORDER BY adoption_date DESC LIMIT 3";

        return $this->pdo->query($query)->fetchAll();
    }
}
