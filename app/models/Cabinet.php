<?php

namespace app\models;

use core\App;
use core\mvc\Model;

class Cabinet extends Model
{
    protected $userData;

    public function __construct()
    {
        parent::__construct();

        if(isset($_SESSION['user']['token'])) {
            $token = $_SESSION['user']['token'];
        }elseif(isset($_COOKIE['user'])){
            $token = $_COOKIE['user'];
        }else{
            redirect(HOME);
        }

        if($token) {
            $user = $this->db->prepare("SELECT * FROM users WHERE token=:token");
            $user->bindValue(":token", $token);
            $user->execute();
            $this->userData = $user->fetch();
        }
    }

    public function getUserData()
    {
        return $this->userData;
    }
}