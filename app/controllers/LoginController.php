<?php

namespace app\controllers;

use app\models\UserLogin;
use core\mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {

    }

    public function loginAction()
    {
        $login = $this->escapeString($_POST['login']) ?? null;
        $password = $this->escapeString($_POST['password']) ?? null;
        $remember = $this->escapeString($_POST['remember']) ?? null;

        $userObj = new UserLogin();
        if($userObj->checkLogin($login)) {
            if($userObj->checkPassword($password)){
                $userObj->logUser($remember);
                echo "success";
            }else{
                echo "Пароль неверный!";
            }
        }else{
            echo "Пользователь с таким логином не найден!";
        }
        exit;
    }

    protected function escapeString(string $string)
    {
        return htmlspecialchars(trim($string));
    }
}