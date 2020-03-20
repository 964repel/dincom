<?php


namespace dinkom;


class Registry
{
    use TSingleton;

    protected static $properties = [];

    public function setProperties($name, $value){
        self::$properties[$name] = $value;
    }
    public static function getProperty($name){
        if (isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }
    public static function getProperties(){
        return self::$properties;
    }
}