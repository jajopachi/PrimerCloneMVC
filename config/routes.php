<?php
//use core\Router;


core\Router::addRoute("#^$#", ["controller" => "Main", "action" => "index"]);
core\Router::addRoute("#^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$#");