<?php

namespace App\Model;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'association';

    public function showLastArticle()
    {
        $query = "SELECT * FROM" .self::TABLE. "ORDER BY date DESC LIMIT 1";
        return $this->PDO->query($query)->fetch();
    }
}