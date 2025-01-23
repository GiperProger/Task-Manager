<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Database;
use App\Controllers\AuthController;

// Инициализация базы данных
$db = new Database('localhost', 'task-manager', 'is-vladis', 'secret', 33061);

// Создаём контроллер
$authController = new AuthController($db->getConnection());

// Роуты
$router = new Router();
$router->add('/', function () {
    echo "Добро пожаловать в Task Manager!";
});
$router->add('/register', [$authController, 'register']);
$router->add('/login', [$authController, 'login']);
$router->add('/logout', [$authController, 'logout']);

$router->dispatch($_SERVER['REQUEST_URI']);;