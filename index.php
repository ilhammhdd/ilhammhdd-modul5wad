<?php

use Model\BaseModel as Model;
use Controller\Controller as Controller;
use Controller\LaboratoriumController;

spl_autoload_register(function ($className) {
    include $className . ".php";
});

Model::connectMysql("localhost", "ilhammhdd", "modul5", "laboratorium_si");

$splittedUri = explode('?', $_SERVER["REQUEST_URI"], 2);
$request_uri = $splittedUri[0];

switch ($request_uri) {
    case "/laboratorium/create":
        Controller::create(new LaboratoriumController());
        break;
    case "/laboratorium":
        Controller::read(new LaboratoriumController());
        break;
    case "/laboratorium/update":
        Controller::update(new LaboratoriumController());
        break;
    case "/laboratorium/delete":
        Controller::delete(new LaboratoriumController());
        break;
}