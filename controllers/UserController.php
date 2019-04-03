<?php


namespace app\controllers;


use app\model\Users;

class UserController extends Controller
{

    public function actionLogin()
    {
        //Авторизуем пользователя - вызываем метод из User
        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            if (!Users::auth($login, $pass)) {
                Die("Не верный пароль!");
            } else
                header("Location: /");
        }
    }

    public function actionLogout() {
        session_destroy();
        header("Location: /");
    }
}