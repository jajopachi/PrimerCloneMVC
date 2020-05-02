<?php

namespace core;

class Registry
{
    use TSingleton;

    protected static $properties;

    public static function setProperty($key, $value)
    {
        if(isset(self::$properties[$key])) {
            throw new \Exception("Property with such key <b>$key</b> is exists!");
        }

        self::$properties[$key] = $value;
    }

    public static function getProperty(string $key)
    {
        if(!isset(self::$properties[$key])) {
            throw new \Exception("There is no value by this key!");
        }

        return self::$properties[$key];
    }

    public static function getProperties()
    {
        return self::$properties;
    }
}