<?php

namespace app\models;

use core\mvc\Model;

class Categories extends Model
{
    public function getCatsWithoutParent()
    {
        $categories = $this->db->query("SELECT * FROM categories WHERE parent_category=0")
                               ->fetchAll();
        return $categories;
    }


}