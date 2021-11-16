<?php

namespace App\Model;

class MemberManager extends AbstractManager
{
    public const TABLE = 'member';

    public function showMembers()
    {
        $query = " SELECT * FROM " . self::TABLE;

        return $this->pdo->query($query)->fetchAll();
    }
}
