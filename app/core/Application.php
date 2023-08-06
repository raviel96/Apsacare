<?php

namespace app\core;

use Exception;

class Application {

    public string $userClass;
    public string $layout = "main";
    public static string $ROOT_DIR;
    public static Application $app;
    private Router $router;
    private Request $request;
    private Response $response;
    private Session $session;
    private ?Controller $controller = null;
    private Database $database;
    private View $view;
    
    
    public function __construct($rootPath, array $config) {
        
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->database = new Database($config['db']);
        
    }

    public function run() {
        try {
            echo $this->router->resolve();
        } catch(Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView("_error", ['exception' => $e]);
        }
    }

    /**
     * Getters and Setters
     */

	public function getRouter(): Router {
		return $this->router;
	}
	
	public function setRouter(Router $router) {
		$this->router = $router;
	}
	
	public function getRequest(): Request {
		return $this->request;
	}
	
	public function setRequest(Request $request) {
		$this->request = $request;
	}
	
	public function getResponse(): Response {
		return $this->response;
	}
	
	public function setResponse(Response $response) {
		$this->response = $response;
	}
	
	public function getSession(): Session {
		return $this->session;
	}
	
	public function setSession(Session $session) {
		$this->session = $session;
	}
	
	public function getController(): ?Controller {
		return $this->controller;
	}
	
	public function setController(?Controller $controller) {
		$this->controller = $controller;
	}
	
	public function getDatabase(): Database {
		return $this->database;
	}
	
	public function setDatabase(Database $database) {
		$this->database = $database;
	}
	
	public function getView():View {
		return $this->view;
	}
	
	public function setView(View $view) {
		$this->view = $view;
	}
}