<?php

class TaskList extends ACore
{

    protected $m;

    public function __construct()
    {
        $this->m = new TaskListModel();
    }

    public function obr(){
        $userId = intval($_SESSION['id_user']);


        //реализуем добавление task
        if (isset($_POST['btnadd'])) {
            $work = $_POST['work'];
            if (!empty($_POST['work'])) {
                $this->m->setDescriptionTask($userId, $work);
            }
            header("location: ../index.php?option=tasklist");
            exit;
        }


        //реализуем удаление всего списка дел
        if (isset($_POST['btnrmall'])) {
            $this->m->deleteTaskList($userId);
            header("location: ../index.php?option=tasklist");
            exit;
        }


        //реализуем удаление орпеделенного task
        if (isset($_POST['btnrm'])) {
            $idTask = $_POST['btnrm'];
            $this->m->deleteIdTask($idTask);
            header("location: ../index.php?option=tasklist");
            exit;
        }


        //изменяем статус на ready
        if (isset($_POST['btnrd'])) {
            $idTask = $_POST['btnrd'];
            $this->m->statusReadyTask($idTask);
            header("location: ../index.php?option=tasklist");
            exit;
        }

        //изменяем статус на unready
        if (isset($_POST['btnunrd'])) {
            $idTask = $_POST['btnunrd'];
            $this->m->statusUnReadyTask($idTask);
            header("location: ../index.php?option=tasklist");
            exit;
        }
    }

    public function getContent()
    {
        // TODO: Implement getContent() method.
    }
}