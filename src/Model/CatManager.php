<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT cat.*, TIMESTAMPDIFF(YEAR, birth_date, NOW()) as age,
        gender.name gender, gender.id, furr.*, color.name color, color.id, breed.name breed, breed.id
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
        $query = "SELECT c.*, g.name gender FROM " . self::TABLE . " c
        LEFT JOIN gender g ON g.id=c.gender_id
        WHERE adoption_date IS NULL 
        ORDER BY c.id DESC LIMIT 3";

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
        $query = "SELECT c.*, g.name gender FROM " . self::TABLE . " c
        LEFT JOIN gender g ON g.id=c.gender_id
        WHERE adoption_date IS NOT NULL 
        ORDER BY adoption_date DESC LIMIT 3";

        return $this->pdo->query($query)->fetchAll();
    }
}
