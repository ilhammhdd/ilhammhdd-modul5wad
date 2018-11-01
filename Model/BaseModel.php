<?php

namespace Model;

abstract class BaseModel
{
    public static $mysqlConn;

    public static function connectMysql($host, $user, $password, $db)
    {
        self::$mysqlConn = new \mysqli($host, $user, $password, $db);
    }

    public abstract function create();

    public abstract function read();

    public abstract function update();

    public abstract function delete();
}