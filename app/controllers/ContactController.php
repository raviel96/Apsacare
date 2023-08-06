<?php

namespace app\controllers;
use app\core\Controller;

class ContactController extends Controller {

    public function index() {
        
        return $this->render("contact");
    }
}