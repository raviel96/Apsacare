<?php

use app\core\Application;

require_once __DIR__."/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'admin' => [
        'mail' => $_ENV['ADMIN_MAIL'],
        'mail_pwd' => $_ENV['ADMIN_MAIL_PWD']
    ],
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__."/app", $config);


$app->getDatabase()->applyMigrations();