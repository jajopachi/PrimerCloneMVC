<?php

namespace app\controllers;

use app\models\Cabinet;
use core\App;
use core\mvc\Controller;

class CabinetController extends Controller
{
    public $module = "user";

    public function __construct(array $route)
    {
        parent::__construct($route);
        $module = $this->module;
        $this->setData(compact("module"));
    }

    public function indexAction()
    {
        $userObj = new Cabinet();
        $user = $userObj->getUserData();
        $this->setData(compact( "user"));
    }

    public function logoutAction()
    {
        setcookie("user", "", time()-1, "/");
        unset($_SESSION['user']);
        redirect("/");
    }

    public function myOrdersAction()
    {

    }

    public function mySettingsAction()
    {

    }

    public function supportAction()
    {

    }
}