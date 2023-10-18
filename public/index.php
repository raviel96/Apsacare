<?php

use app\controllers\AboutController;
use app\controllers\AccompaniementController;
use app\controllers\AdminController;
use app\controllers\ApiController;
use app\controllers\AuthController;
use app\controllers\CguController;
use app\controllers\ContactController;
use app\controllers\CourseController;
use app\controllers\FormationController;
use app\controllers\HomeController;
use app\core\Application;
use app\models\User;

require_once __DIR__."/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'user' => User::class,
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

$app = new Application(dirname(__DIR__)."/app", $config);

$app->getRouter()->get("/", [HomeController::class, "index"]);
$app->getRouter()->get("/accompagnement", [AccompaniementController::class, "index"]);
$app->getRouter()->get("/formation", [FormationController::class, "index"]);
$app->getRouter()->get("/a-propos", [AboutController::class, "index"]);
$app->getRouter()->get("/contact", [ContactController::class, "contact"]);
$app->getRouter()->post("/contact", [ContactController::class, "contact"]);
$app->getRouter()->get("/cgu", [CguController::class, "index"]);
$app->getRouter()->get("/login", [AuthController::class, "login"]);
$app->getRouter()->post("/login", [AuthController::class, "login"]);

$app->getRouter()->get("/portal/admin", [AdminController::class, "index"]);

$app->getRouter()->post("/portal/admin/course/create", [CourseController::class, "create"]);
$app->getRouter()->post("/portal/admin/course/update", [CourseController::class, "update"]);
$app->getRouter()->post("/portal/admin/course/delete", [CourseController::class, "delete"]);

$app->getRouter()->get("/api/course", [ApiController::class, "getOneCourse"]);
$app->getRouter()->get("/api/courses", [ApiController::class, "getAllCourses"]);
$app->getRouter()->get("/api/category", [ApiController::class, "getOneCategory"]);
$app->getRouter()->get("/api/categories", [ApiController::class, "getAllCategories"]);

$app->run();