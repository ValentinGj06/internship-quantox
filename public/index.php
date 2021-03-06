<?php

use app\controllers\HomeController;
use app\controllers\ResultController;
use thecodeholic\phpmvc\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/login', [HomeController::class, 'login']);
$app->router->post('/login', [HomeController::class, 'login']);
$app->router->get('/register', [HomeController::class, 'register']);
$app->router->post('/register', [HomeController::class, 'register']);
$app->router->get('/logout', [HomeController::class, 'logout']);
$app->router->get('/result', [ResultController::class, 'index']);
$app->router->post('/result', [ResultController::class, 'fetch']);

$app->run();