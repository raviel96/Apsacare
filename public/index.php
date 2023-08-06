<?php

use app\controllers\AboutController;
use app\controllers\AccompaniementController;
use app\controllers\CguController;
use app\controllers\ContactController;
use app\controllers\FormationController;
use app\controllers\HomeController;
use app\core\Application;

require_once __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__)."/app", $config);

$app->getRouter()->get("/", [HomeController::class, "index"]);
$app->getRouter()->get("/accompagnement", [AccompaniementController::class, "index"]);
$app->getRouter()->get("/formation", [FormationController::class, "index"]);
$app->getRouter()->get("/a-propos", [AboutController::class, "index"]);
$app->getRouter()->get("/contact", [ContactController::class, "index"]);
$app->getRouter()->get("/cgu", [CguController::class, "index"]);

$app->run();