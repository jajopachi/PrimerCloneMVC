<?php

namespace core;

trait TSingleton
{
    public static $instance;

    public static function getInstance()
    {
        if(static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}