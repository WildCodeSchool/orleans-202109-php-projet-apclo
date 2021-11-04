<?php

namespace App\Model;

class CatManager extends AbstractManager
{
    public const TABLE = 'cat';

    public function selectOneById(int $id)
    {
        $statement = $this->pdo->prepare("SELECT cat.name as name, image, birth_date, digital_chip,
        description, adoption_date, gender.name as gender, fur.length as length,
        color.name as color, breed.name as breed FROM " .
        self::TABLE . " LEFT JOIN gender ON gender.id = cat.gender_id JOIN fur ON fur.id = cat.fur_id
        JOIN breed ON breed.id = cat.breed_id JOIN color ON color.id = cat.color_id WHERE cat.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
