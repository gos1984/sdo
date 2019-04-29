<?php
namespace core\traits;
use PDO;

trait Product{
	public function getCategory($id = null)
    {
        $category = [];
        $where = "";
        if(!empty($id)) {
            $where = " WHERE id = $id";
        }
        $c = $this->db->query("SELECT * FROM category $where");
        while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
            $category[$row['id']] = Array(
                'name'  => $row['name'],
                'image' => $row['image'],
            );
        }
		return $category;
	}

    public function getProduct($categoryId = null, $directionId = null)
    {
        $product = [];
        $where = "";
        if(!empty($categoryId) && !empty($directionId)) {
            $where = " WHERE category_id = $categoryId  AND ".$this->generateDirectionRequest($directionId);
        } else {
            if(!empty($categoryId)) {
                $where = " WHERE category_id = $categoryId";
            }

            if(!empty($directionId)) {
                $where = "WHERE ".$this->generateDirectionRequest($directionId);

            }
        }
        $p = $this->db->query("SELECT * FROM product $where");
        while ($row = $p->fetch(PDO::FETCH_ASSOC)) {
            $product[$row['id']] = Array(
                'name'  => $row['name'],
                'category_id' => $row['category_id'],
                'direction_id' => $row['direction_id'],
                'date' => $row['date'],
                'price' => $row['price'],
                'format' => $row['format'],
                'quantity' => $row['quantity'],
                'link' => $row['link'],
            );
        }

        return $product;
    }

    public function getDirection($id = null)
    {
        $direction = [];
        $where = "";
        if(!empty($id)) {
                $where = " WHERE ".$this->generateDirectionRequest($id);
        }
        $c = $this->db->query("SELECT * FROM direction $where");
        while ($row = $c->fetch(PDO::FETCH_ASSOC)) {
            $direction[$row['id']] = $row['name'];
        }
        return $direction;
    }

    private function generateDirectionRequest($id) {
        if(is_array($id)) {
            $id = implode(",",$id);
            return " direction_id IN($id)";
        } else {
            return " direction_id = $id";
        }
    }
}

?>