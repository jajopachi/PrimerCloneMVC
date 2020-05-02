<?php

namespace app\Exceptions;

class ExceptionHandler
{
    public function __construct()
    {
        if(DEBUG) {
            error_reporting(-1);
        }else{
            error_reporting(0);
        }

        set_exception_handler([$this, "exceptionHandler"]);
    }

    public function exceptionHandler($e)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
        $this->displayError($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    private function logError($errMsg, $errFile, $errLine, $errCode = 0)
    {
        $msg = "[". date("H:i:s d-m-Y") ."]\n".
            "Message: " . $errMsg ."\n".
            "File: " . $errFile ."\n".
            "Line: " . $errLine ."\n".
            "Code: " . $errCode ."\n".
            "=========================\n\n";
        error_log($msg, 3, EXCEPTIONS . "/log/error.log");
    }

    private function displayError($errMsg, $errFile, $errLine, $errCode = 0)
    {
        if(DEBUG == 1) {
            dep(EXCEPTIONS . "/templates/development.php");
            require_once EXCEPTIONS . "/templates/development.php";
        }elseif(!DEBUG && $errCode = 404) {
            require_once EXCEPTIONS . "/templates/404.php";
        }else{
            require_once EXCEPTIONS . "/templates/production.php";
        }
    }
}