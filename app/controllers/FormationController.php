<?php

namespace app\controllers;
use app\core\Controller;

class FormationController extends Controller {

    public function index() {    
        return $this->render("formation");
    }
}