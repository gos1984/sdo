<?php


namespace core\traits;
use PDO;

trait Review
{
    public function getReview($id = null) {
        $review = [];
        $where = "";

        if(!empty($id)) {
            $where = " WHERE id = $id";
        }
        $r = $this->db->query("SELECT * FROM review $where");

        while ($row = $r->fetch(PDO::FETCH_ASSOC)) {
            $review[$row['id']] = Array(
                'name'  => $row['name'],
                'position' => $row['position'],
                'description' => $row['description'],
                'photo' => $row['photo'],
            );
        }
        return $review;
    }
}