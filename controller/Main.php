<?php

class Main extends ACore
{

    public function obr()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_SESSION['message'] = [];
        $passwordVerify = password_verify($password, $this->m->getPassword($login));

        //валидация на пустые поля
        if ($login == '' || $password == '') {
            unset($_SESSION['login']);
            $_SESSION['message'][] = 'Заполните пустые поля';
            header("location: ../index.php");
            exit;
        }

        if ($login == $this->m->getLogin($login)) {
            if (!$passwordVerify) {
                unset($_SESSION['login']);
                $_SESSION['message'][] = 'Такой логин уже существует';
                header("location: ../index.php");
                exit;
            }
            if ($passwordVerify) {
                $_SESSION['id_user'] = $this->m->getUserId($login);
                $_SESSION['login'] = $login;
                header("location: ?option=tasklist");
                exit;
            }
        } else {
            $_SESSION['id_user'] = $this->m->getUserId($login);
            $_SESSION['login'] = $login;
            $this->m->createUser($login, $passwordHash);
            header("location: ?option=tasklist");
            exit;
        }
    }

    public function getContent()
    {
    }
}