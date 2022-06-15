<?php

class model
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


    //выборка description пользователя
    function getDescriptionTaskList($userId)
    {
        $stmt = $this->db->prepare("SELECT task.description FROM task INNER JOIN user ON task.user_id = user.user_id WHERE user.user_id = (?)");
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../task_list.php?error=getDescriptionTaskList");
            exit;
        }
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }


    //выборка task_id у Task
    function getIdTask($userId)
    {
        $stmt = $this->db->prepare("SELECT task.task_id FROM task INNER JOIN user ON task.user_id = user.user_id WHERE user.user_id = (?)");
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../task_list.php?error=getIdTaskList");
            exit;
        }
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }


    //выборка status у TaskList
    function getStatusTaskList($userId)
    {
        $stmt = $this->db->prepare("SELECT task.status FROM task INNER JOIN user ON task.user_id = user.user_id WHERE user.user_id = (?)");
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../task_list.php?error=getStatusTaskList");
            exit;
        }
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }


    //вставка description пользователя
    function setDescriptionTask($userId, $description)
    {
        $stmt = $this->db->prepare("INSERT INTO task (user_id, description, status) VALUES (?, ?, ?)");
        if (!$stmt->execute(array($userId, $description, 'unchecked'))) {
            $stmt = null;
            header("location: ../task_list.php?error=getTaskListFailed");
            exit;
        }
        $stmt = null;
    }


    //удаление определенного таска из листа
    function deleteIdTask($idTask)
    {
        $stmt = $this->db->prepare("DELETE FROM task WHERE task_id = (?)");
        if (!$stmt->execute(array($idTask))) {
            $stmt = null;
            header("location: ../task_list.php?error=deleteIdTaskList");
            exit;
        }
        $stmt = null;
    }


    //удаление всего списка
    function deleteTaskList($userId)
    {
        $stmt = $this->db->prepare("DELETE FROM task WHERE user_id = (?)");
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: ../task_list.php?error=deleteIdTaskList");
            exit;
        }
        $stmt = null;
    }

    //апдейт статуса task на ready
    function statusReadyTask($idTask)
    {
        $stmt = $this->db->prepare("UPDATE task SET status = IF (status = 'unchecked', 'checked', status) WHERE task_id = (?)");
        if (!$stmt->execute(array($idTask))) {
            $stmt = null;
            header("location: ../task_list.php?error=deleteIdTaskList");
            exit;
        }
        $stmt = null;
    }


    //апдейт статуса task на unready
    function statusUnReadyTask($idTask)
    {
        $stmt = $this->db->prepare("UPDATE task SET status = IF (status = 'checked', 'unchecked', status) WHERE task_id = (?)");
        if (!$stmt->execute(array($idTask))) {
            $stmt = null;
            header("location: ../task_list.php?error=deleteIdTaskList");
            exit;
        }
        $stmt = null;
    }



}