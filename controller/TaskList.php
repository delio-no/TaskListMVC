<?php

class TaskList extends ACore
{

    public function obr(){
        $userId = intval($_SESSION['id_user']);


        //реализуем добавление task
        if (isset($_POST['btnadd'])) {
            $work = $_POST['work'];
            if (!empty($_POST['work'])) {
                $this->m->setDescriptionTask($userId, $work);
            }
            header("location: ../index.php");
            exit;
        }


        //реализуем удаление всего списка дел
        if (isset($_POST['btnrmall'])) {
            $this->m->deleteTaskList($userId);
            header("location: ../index.php");
            exit;
        }


        //реализуем удаление орпеделенного task
        if (isset($_POST['btnrm'])) {
            $idTask = $_POST['btnrm'];
            $this->m->deleteIdTask($idTask);
            header("location: ../index.php");
            exit;
        }


        //изменяем статус на ready
        if (isset($_POST['btnrd'])) {
            $idTask = $_POST['btnrd'];
            $this->m->statusReadyTask($idTask);
            header("location: ../index.php");
            exit;
        }

        //изменяем статус на unready
        if (isset($_POST['btnunrd'])) {
            $idTask = $_POST['btnunrd'];
            $this->m->statusUnReadyTask($idTask);
            header("location: ../index.php");
            exit;
        }
    }

    function getContent()
    {
        // TODO: Implement getContent() method.
        require_once "header/taskList.php";
        require_once "tpl/taskListView.php";
    }
}