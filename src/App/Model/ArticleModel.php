<?php
declare(strict_types=1);
require_once 'App/Core/BaseModel.php';

class ArticleModel extends BaseModel
{
    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM article");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}