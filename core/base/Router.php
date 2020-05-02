<?php

namespace core;

use app\Exceptions\UndefinedControllerException;
use app\Exceptions\UndefinedMethodException;

class Router
{
    protected static $route = [];
    protected static $routes = [];

    public static function makeUrl($url)
    {
        $url = self::removeQueryString(trim($url, "/"));
        if(self::matchUrl($url)) {
            $controller = self::getNamespace() . self::$route['controller'] . "Controller";
            $controllerFile = self::makeFilePath(ROOT . "/" . $controller.".php");

            if(file_exists($controllerFile)) {
                $controllerObj = new $controller(self::$route);
                $action = self::makeAction(self::$route['action']) . "Action";
                if(method_exists($controllerObj, $action)) {
                    $controllerObj->$action();
                    $controllerObj->getView();
                }else{
                    throw new \Exception("Such method <u>$action</u> not found in <b>$controller</b>");
                }
            }else{
                throw new \Exception("Such controller is not found <b>$controller</b>");
            }
        }else{
            throw new \Exception("Page not found!", 404);
        }
    }
//    public static function getRoutes()
//    {
//        return self::$routes;
//    }


    public static function addRoute($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function matchUrl($url)
    {
        foreach (self::$routes as $key => $value)
        {
            $pattern = $key;
            $url = trim($url, "/");
            if(preg_match($pattern, $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if(!is_int($k)) {
                        $route[$k] = $v;
                    }
                }
                if(empty($route['controller'])) {
                    $route['controller'] = "Main";
                }
                if(empty($route['action'])) {
                    $route['action'] = "index";
                }
                self::$route['controller'] = self::makeController($route['controller']);
                self::$route['action'] = self::makeAction($route['action']);

                return true;
            }
        }
        return false;
    }
    private static function makeFilePath(string $path)
    {
        $path = str_replace("\\", "/", $path);
        return $path;
    }

    private static function getNamespace()
    {
        $namespace = "app\controllers\\";
        return $namespace;
    }

    private static function makeController($name)
    {
        $name = str_replace("-", " ", $name);
        $name = ucwords($name);
        $name = str_replace(" ", "", $name);
        return $name;
    }

    private static function makeAction($name)
    {
        $name = str_replace("-", " ", $name);
        $name = ucwords($name);
        $name = lcfirst(str_replace(" ", "", $name));
        return $name;
    }

    private static function removeQueryString($url)
    {
        if(strpos($url, "&") !== false) {
            $params = explode("&", $url, 2);
            $url = explode("&", $url)[0];
        }
        return $url;
    }
}