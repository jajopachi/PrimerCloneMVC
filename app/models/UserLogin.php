<?php

namespace app\models;

use core\mvc\Model;

class UserLogin extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $email;

    protected $user = [];

    public function checkLogin(string $login)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE login=:login");
        $query->bindValue(":login", $login);
        $query->execute();
        if($query->rowCount()) {
            $this->login = $login;
            return true;
        }
        return false;
    }

    public function checkPassword(string $password)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE login=:login AND password=:password");
        $query->bindValue(":login", $this->login);
        $query->bindValue(":password", $password);
        $query->execute();
        if($query->rowCount()) {
            $this->password = $password;
            return true;
        }
        return false;
    }

    public function logUser($remember)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE login=:login AND password=:password");
        $query->bindValue(":login", $this->login);
        $query->bindValue(":password", $this->password);
        $query->execute();
        $this->user = $query->fetch();

        $token = md5($this->user['password'] . $this->user['login']) . md5(time());
        $this->saveToken($this->user['id'], $token);
        if($remember) {
            setcookie("user", $token, time() + 3600 * 24 * 7, "/");
        }else{
            $_SESSION['user']['token'] = $token;
        }
    }

    private function saveToken($id, $token)
    {
        $insert = $this->db->prepare("UPDATE users SET token=:token WHERE id=:id");
        $insert->bindValue(":id", $id);
        $insert->bindValue(":token", $token);
        $insert->execute();
    }
}