<?php


namespace dinkom;


class Db
{
    use TSingleton;


    protected function __construct()
    {
        require_once ROOT . "/rb/rb-mysql.php";
        $db = require_once CONF . '/config_db.php';

    \R::setup($db['dsn'], $db['user'], $db['pass']);
    if (!\R::testConnection()){
        throw new \Exception("No connect", 500);
    }
    \R::freeze(true);
    if (DEBUG){
        \R::debug(true, 1);
    }
    }
}