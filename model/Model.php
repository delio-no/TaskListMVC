<?php

class Model
{
    protected $db;

    public function __construct()
    {
        try {
            $username = "root";
            $passwd = "root";
            $this->db = new PDO('mysql:host=localhost;dbname=db_task_list', $username, $passwd);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}