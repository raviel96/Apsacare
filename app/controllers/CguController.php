<?php

namespace app\controllers;
use app\core\Controller;

class CguController extends Controller {
    public function index() {
        return $this->render("cgu");
    }
    
}