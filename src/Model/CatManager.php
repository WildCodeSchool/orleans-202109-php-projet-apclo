<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public const CAT_AGES = [
        '>' => 'Adulte',
        '<=' => 'Chaton'
    ];

    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT cat.name name, image, TIMESTAMPDIFF(YEAR, birth_date, NOW()) as age,
        digital_chip, description, adoption_date, gender.name gender, fur.length length,
        color.name color, breed.name breed 
        FROM " . self::TABLE . " 
            LEFT JOIN gender ON gender.id = cat.gender_id 
            LEFT JOIN fur ON furr.id = cat.furr_id
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

    public function selectAllCats(array $filters): array
    {
        $queryParts = [];
        $query = "SELECT c.*, g.name gender, g.id genderId 
        FROM " . self::TABLE . " c LEFT JOIN gender g ON g.id=c.gender_id ";
        if (!empty($filters['catGender'])) {
            $queryParts[] = "g.id=:catGender";
        }
        if (!empty($filters['catAge']) && key_exists($filters['catAge'], self::CAT_AGES)) {
            $queryParts[] = "TIMESTAMPDIFF(YEAR, birth_date, NOW()) " . $filters['catAge']  . "1";
        }
        if (!empty($queryParts)) {
            $query .= "WHERE " . implode(" AND ", $queryParts);
        }
        $statement = $this->pdo->prepare($query);

        if (!empty($filters['catGender'])) {
            $statement->bindValue('catGender', $filters['catGender'], \PDO::PARAM_INT);
        }
        $statement->execute();

        return $statement->fetchAll();
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
