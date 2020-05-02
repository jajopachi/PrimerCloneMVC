<?php

namespace app\models;

use core\mvc\Model;

class Products extends Model
{
    public function getProduct($id)
    {
        $query = $this->db->prepare("SELECT 
                    name, alias, description, price, quantity, amount, category_id, id 
                     FROM products WHERE id=$id");
        $query->execute();

        $product = $query->fetch();
        return $product;
    }

    public function getAllProducts()
    {
        $hits = $this->db->query("SELECT * FROM products WHERE hit=1 ORDER BY id DESC LIMIT 4")->fetchAll();
        $new = $this->db->query("SELECT * FROM products WHERE new=1 ORDER BY id DESC LIMIT 4")->fetchAll();
        return [$hits, $new];
    }
}