<?php

namespace core\mvc;

use core\DataBase;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = DataBase::getConnection();
    }
}