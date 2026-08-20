<?php
declare(strict_types=1);
require_once 'App/Core/BaseModel.php';

class OrderingModel extends BaseModel
{
    public function createOrdering(string $address): int
    {
        $stmt = $this->db->prepare("INSERT INTO ordering (address) VALUES (?)");
        $stmt->bind_param("s", $address);
        $stmt->execute();
        return $this->db->insert_id;
    }


    public function deleteOrdering(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM ordering WHERE ordering_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


    public function createOrderedArticle(int $article_id, int $ordering_id, int $status = 0): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO ordered_article (ordering_id, article_id, status) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("iii", $ordering_id, $article_id, $status);
        return $stmt->execute();
    }


    public function updateOrderedArticle(int $id, int $status): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE ordered_article SET status = ? WHERE ordered_article_id = ?"
        );
        $stmt->bind_param("ii", $status, $id);
        return $stmt->execute();
    }


    public function updateStatusByOrderingId(int $ordering_id, int $status): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE ordered_article SET status = ? WHERE ordering_id = ?"
        );
        $stmt->bind_param("ii", $status, $ordering_id);
        return $stmt->execute();
    }


    public function groupOrders(array $rows): array
    {
        $orders = [];
        foreach ($rows as $row) {
            $oid = (int)$row['ordering_id'];
            if (!isset($orders[$oid])) {
                $orders[$oid] = [
                    'ordering_id'    =>  $oid,
                    'address'        =>  $row['address'],
                    'items'          =>  [],
                    'total'          =>  0,
                ];
            }
            $orders[$oid]['items'][] = [
                'ordered_article_id' => (int)$row['ordered_article_id'],
                'article_name'       => $row['article_name'],
                'article_price'      => $row['article_price'],
                'article_picture'    => $row['article_picture'],
                'status'             => (int)$row['status'],
            ];
            $orders[$oid]['total'] += (float)$row['article_price'];
        }

        return $orders;
    }


    public function getOrderingById(int $ordering_id): array
    {
        $stmt = $this->db->prepare("
            SELECT
                o.ordering_id,
                o.address,
                o.ordering_time,
                oa.ordered_article_id,
                oa.status,
                a.name   AS article_name,
                a.price  AS article_price,
                a.picture AS article_picture
            FROM ordering o
            JOIN ordered_article oa ON o.ordering_id = oa.ordering_id
            JOIN article a          ON oa.article_id  = a.article_id
            WHERE o.ordering_id = ?
            ORDER BY o.ordering_time DESC, o.ordering_id, oa.ordered_article_id
        ");

        $stmt->bind_param("i", $ordering_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = $this->groupOrders($result->fetch_all(MYSQLI_ASSOC));

        return $orders;
    }


    public function getAllForBaker(): array
    {
        $stmt = $this->db->query("
            SELECT
                oa.ordered_article_id,
                oa.status,
                oa.ordering_id,
                a.name    AS article_name,
                a.picture AS article_picture,
                o.ordering_time
            FROM ordered_article oa
            JOIN article  a ON oa.article_id  = a.article_id
            JOIN ordering o ON oa.ordering_id = o.ordering_id
            WHERE oa.status < 2
            ORDER BY o.ordering_time ASC, oa.ordered_article_id ASC
        ");

        return $stmt->fetch_all(MYSQLI_ASSOC);
    }


    public function getAllForDriver(): array
    {
        $stmt = $this->db->query("
            SELECT
                oa.ordered_article_id,
                oa.status,
                oa.ordering_id,
                a.name    AS article_name,
                a.picture AS article_picture,
                a.price   AS article_price,
                o.address,
                o.ordering_time
            FROM ordered_article oa
            JOIN article  a ON oa.article_id  = a.article_id
            JOIN ordering o ON oa.ordering_id = o.ordering_id
            WHERE oa.ordering_id NOT IN (
                SELECT ordering_id FROM ordered_article WHERE status < 2
            )
            ORDER BY o.ordering_time ASC, oa.ordered_article_id ASC
        ");

        $orders = $this->groupOrders($stmt->fetch_all(MYSQLI_ASSOC));

        return $orders;
    }
}