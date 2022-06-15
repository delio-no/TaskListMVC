<?php

abstract class ACore
{

    protected $m;

    public function __construct()
    {
        $this->m = new model();
    }



    public function getBody(){
        if ($_POST){
            $this->obr();
        }
        $this->getContent();
    }

    abstract function getContent();

}