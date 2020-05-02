<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("APP", ROOT . "/app");
define("CONF", ROOT . "/config");
define("EXCEPTIONS", APP . "/Exceptions");
define("LAYOUTS", ROOT . "/app/views/layouts");
define("VIEWS", ROOT . "/app/views");

$app = "http://".$_SERVER['HTTP_HOST'] . "/";
define("HOME", $app);

require_once CONF . "/routes.php";
require_once CONF . "/functions.php";
