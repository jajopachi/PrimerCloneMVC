<?php

namespace core;

use app\Exceptions\ExceptionHandler;
use app\models\Cabinet;
use core\mvc\Model;

class App
{
    public static $app;

    public function __construct()
    {
        session_start();
        $url = $_SERVER['QUERY_STRING'];
        self::$app = Registry::getInstance();
        Router::makeUrl($url);
        new ExceptionHandler();
//        $this->authUser();
    }

    protected function authUser()
    {
        if(isset($_SESSION['user']) || isset($_COOKIE['user'])) {
            new Cabinet();
        }
    }
}