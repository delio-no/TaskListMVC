<?php

ob_start();

session_start();

function controller($class)
{
    $filename = "controller/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }
}

function model($class)
{
    $filename = "model/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }
}

spl_autoload_register('controller');
spl_autoload_register('model');


if ($_GET['class']) {
    $class = trim(strip_tags($_GET['class']));
} else {
    $class = 'main';
}


if ($_GET['mtd']) {
    $mtd = strval(trim(strip_tags($_GET['mtd'])));
}

if (class_exists($class)) {
    $obj = new $class;
    $obj->getBody($class);
    if (method_exists($obj, "$mtd")){
        $obj->$mtd();
    }
} else {
    exit("<p>Не правильные данные для входа</p>");
}


