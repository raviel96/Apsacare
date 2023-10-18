<?php

namespace app\controllers;

use app\core\Controller;
use app\models\User;
use app\models\Course;
use app\models\Category;

class AdminController extends Controller {
    
    public function index() {
        $categories = (new Category())->findAll();
        $users = (new User())->findAll();
        $courses = (new Course())->findAll();

        
    
        return $this->renderOneView("admin", ["categories" => $categories, "users" => $users, "courses" => $courses]);
    }

    
    
}