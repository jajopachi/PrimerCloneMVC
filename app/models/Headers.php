<?php

namespace app\models;

use core\mvc\Model;

class Headers extends Model
{
    public function getHeaderText()
    {
        $header = $this->db->query("SELECT * FROM texts WHERE position='header' AND active=1")
                            ->fetch();
        return $header;
    }

    public function getFooterText()
    {
        $footer = $this->db->query("SELECT * FROM texts WHERE position='footer' AND active=1")
                            ->fetch();
        return $footer;
    }
}