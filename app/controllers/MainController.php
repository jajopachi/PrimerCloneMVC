<?php

namespace app\controllers;

use app\models\MainModel;
use app\models\Products;
use core\App;
use core\mvc\Controller;


class MainController extends Controller
{
    public $module = "main";
    public function indexAction()
    {
        $mainModelObj = new Products();
        $products = $mainModelObj->getAllProducts();
        [$hits, $new] = $products;
        $module = $this->module;

        $currency = App::$app->getProperty("currency");
        $this->setData(compact("hits", "new", "currency", "module"));
    }
}