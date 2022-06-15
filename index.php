<?php

session_start();

function libraryOne($class)
{
    $filename = "controller/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }
}

function libraryTwo($class)
{
    $filename = "model/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }
}

spl_autoload_register('libraryOne');
spl_autoload_register('libraryTwo');


if ($_GET['option']) {
    $class = trim(strip_tags($_GET['option']));
} else {
    $class = 'main';
}


if (class_exists($class)) {
    $obj = new $class;
    $obj->getBody();
} else {
    exit("<p>Не правильные данные для входа</p>");
}

