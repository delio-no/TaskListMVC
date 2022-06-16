<?php

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


if ($_GET['option']) {
    $class = trim(strip_tags($_GET['option']));
} else {
    $class = 'main';
}


if (class_exists($class)) {
    $obj = new $class;
    $obj->getBody($class);
} else {
    exit("<p>Не правильные данные для входа</p>");
}

