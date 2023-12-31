<?php

namespace app\core;

use app\models\Admin;
use app\models\User;
use Exception;
use PDOException;

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
	private Admin $admin;
	private ?User $user;
    
    
    public function __construct($rootPath, array $config) {
		$this->userClass = $config['user'];
        
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->database = new Database($config['db'] ?? []);
        $this->admin = new Admin($config['admin'] ?? []);

		$primaryValue = $this->session->get('user');

        if($primaryValue) {
            $primaryKey = (new $this->userClass)->primaryKey();
            $this->user = (new $this->userClass)->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }


	/**
	 * Call the resolve method of the router and run the application. 
	 * Can throw exception if the router didn't find the path.
	 */
    public function run() {
        try {
            echo $this->router->resolve();
        } catch(Exception $e) {
            $this->response->setStatusCode((int)$e->getCode());
			// echo $this->view->renderOnlyView("_error", ['exception' => $e]);
        } 
    }

	public function login(DatabaseModel $user) {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        
        $this->session->set('user', $primaryValue);

        return true;
    }

	public function logout() {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isConnected() {
        return self::$app->user;
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

	public function getUser(): ?User {
		return $this->user;
	}
	
	public function setUser(?User $user) {
		$this->user = $user;
	}

	public function getAdmin() {
		return $this->admin;
	}
	
	public function setAdmin(Admin $admin) {
		$this->admin = $admin;
	}
}