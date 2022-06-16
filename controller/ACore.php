<?php

abstract class ACore
{

    protected $m;

    public function __construct()
    {
        $this->m = new model();
    }

    public function getBody($tpl)
    {
        if ($_POST) {
            $this->obr();
        }

        include "tpl/index.php";
    }

    abstract function getContent();

}