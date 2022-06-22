<?php

abstract class ACore
{

    protected $m;

    public function __construct()
    {
        $this->m = new Model();

        public function getBody($tpl)
    {
        if ($_POST) {
            $this->obr();
        }

        include "tpl/index.php";
    }

    }

    /*public function getBody($tpl)
    {
        if ($_POST) {
            $this->obr();
        }

        include "tpl/index.php";
    }*/

    abstract function getContent();

}