<?php

namespace App\controllers;

use App\models\User;

class AuthController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->userModel->register($username, $password)) {
                echo "Регистрация прошла успешно!";
            } else {
                echo "Ошибка при регистрации.";
            }
        } else {
            include __DIR__ . '/../views/register.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                echo "Вы успешно вошли!";
            } else {
                echo "Неправильный логин или пароль.";
            }
        } else {
            include __DIR__ . '/../views/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        echo "Вы успешно вышли из системы.";
    }
}