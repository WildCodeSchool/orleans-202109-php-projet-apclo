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
}
