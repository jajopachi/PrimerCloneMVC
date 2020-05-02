<?php

namespace app\models;

use core\mvc\Model;

class Banners extends Model
{
    public function getBanners()
    {
        $banners = $this->db->query("SELECT * FROM banners")
            ->fetchAll();
        return $banners;
    }
}