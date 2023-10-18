<?php

namespace app\controllers;
use app\models\Course;
use app\core\Controller;

class FormationController extends Controller {

    public function index() {    
        $courses = (new Course())->findAll();

        return $this->render("formation", ["courses" => $courses]);
    }
}