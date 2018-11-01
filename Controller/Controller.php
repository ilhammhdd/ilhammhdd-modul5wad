<?php

namespace Controller;

class Controller
{
    public static function create(IController $iController)
    {
        session_start();
        $iController->create();
    }

    public static function read(IController $iController)
    {
        session_start();
        $iController->read();
    }

    public static function update(IController $iController)
    {
        session_start();
        $iController->update();
    }

    public static function delete(IController $iController)
    {
        session_start();
        $iController->delete();
    }
}