<?php

namespace app\controllers;
use app\core\Controller;

class AccompaniementController extends Controller{

    public function index() {
        
        return $this->render("accompaniement");
    }

    
}