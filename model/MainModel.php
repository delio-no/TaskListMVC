<?php

class MainModel extends Model
{
    function getLogin($login)
    {
        $stmt = $this->db->prepare("SELECT login FROM user WHERE login = (?)");
        if (!$stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../task_list.php?error=getLogin");
            exit;
        }
        return $stmt->fetchColumn();
    }

    //создание пользователя
    function createUser($login, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO user (login, password, created_at) VALUES (?, ?, NOW())");
        if (!$stmt->execute(array($login, $password))) {
            $stmt = null;
            header("location: ../task_list.php?error=stmtfailed");
            exit;
        }
        $stmt = null;
    }

    //выборка пароля
    function getPassword($login)
    {
        $stmt = $this->db->prepare("SELECT password FROM user WHERE login = (?)");
        if (!$stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../task_list.php?error=getLogin");
            exit;
        }
        return $stmt->fetchColumn();
    }


    //выборка id пользователя
    function getUserId($login)
    {
        $stmt = $this->db->prepare("SELECT user_id FROM user WHERE login = (?)");
        if (!$stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../task_list.php?error=getLogin");
            exit;
        }
        return $stmt->fetchColumn();
    }
}