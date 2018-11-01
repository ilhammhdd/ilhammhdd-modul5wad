<?php

namespace Controller;

abstract class BaseController implements IController
{
    protected function redirect($url, $data = [])
    {
        unset($_SESSION["VIEW_DATA"]);
        $_SESSION["VIEW_DATA"] = $data;
        return header("Location: " . $url);
    }
}