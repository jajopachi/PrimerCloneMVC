<?php

namespace core\mvc;

use app\views\currency\Currency;
use core\App;

abstract class Controller
{
    protected $route;
    protected $controller;
    protected $view;
    protected $data = [];
    protected $meta;
    protected $layout = "default";
    public $module = "none";

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];

        // Getting Currencies
        $currObj = new Currency();

        $currencies = $currObj->getCurrencies();
        App::$app->setProperty("currencies", $currencies);

        $currency = $currObj->getCurrency($currencies);
        App::$app->setProperty("currency", $currency);

        $title = <<< TITLE
        Магазин аккаунтов! Facebook, VK, E-mail, Instagram и другие!
TITLE;

        $keywords = <<< KEYWORDS
            Магазин аккаунтов, вк, емейл базы, инстаграм, другие социальные сети, продажа аккаунтов
            ,покупка аккаунтов, VK, Facebook, Instagram и другое.
KEYWORDS;

        $description = <<< DESCRIPTION
            В нашем магазине вы можете приобрести любое количество нужных вам аккаунтов,
            от различных емейл баз до аккаунтов в социальных сетях!
            Проверка аккаунтов в течение 15 минут после покупки!
DESCRIPTION;

        $this->setMeta($title, $keywords, $description);
        $this->getMeta();
        $module = $this->module;

        $this->setData(compact("module"));
    }

    public function getView()
    {
        $viewObj = new View($this->view, $this->layout, $this->meta, $this->controller);
        $viewObj->renderHTML($this->data);
    }

    protected function setData($data)
    {
        $this->data = array_merge($data, $this->data);
    }

    protected function setMeta($title = "", $keywords = "", $desc = "")
    {
        $this->meta = ["title" => $title, "keywords" => $keywords, "desc" => $desc];
    }

    protected function isAJAX()
    {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === "XMLHttpRequest") {
            return true;
        }
        return false;
    }

    public function loadView($view, $vars = [])
    {
        extract($vars);
        require_once VIEWS . "/{$this->controller}/{$view}.php";
        exit;
    }

    public function getMeta()
    {
        $meta = "<title>" . $this->meta['title'] . "</title>\n";
        $meta .= "<meta name='keywords' content='". $this->meta['keywords'] . "'>\n";
        $meta .= "<meta name='description' content='" . $this->meta['desc'] . "'>\n";

        echo $meta;
    }
}