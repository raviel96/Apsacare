<?php
namespace app\core;

use app\core\Application;

class Controller {

    public string $layout = "main";
    private string $action = "";

    public function setLayout($layout) {
        $this->layout = $layout;
    }

    public function render($view, $params = []) {
        return Application::$app->getView()->renderView($view, $params);
    }

    public function getAction(): string {
		return $this->action;
	}

    public function setAction($action) {
        $this->action = $action; 
    }
    
}