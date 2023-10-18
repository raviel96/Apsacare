<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model {

    public string $email= "";
    public string $password = "";

    public function rules():array {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels():array {
        return [
            'username' => "Email",
            'password' => "Mot de passe"
        ];
    }

    public function login() {
        $user = (new User)->findOne(['email' => $this->email]);

        if(!$user) {
            $this->addError('email', "Cet email n'existe pas.");
            return false;
        }

        if(!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Mot de passe incorrect.');
            return false;
        }
        
        return Application::$app->login($user);
    }
    

	
	public function getEmail(): string {
		return $this->email;
	}
	
	public function setEmail(string $email) {
		$this->email = $email;
	}
	
	public function getPassword(): string {
		return $this->password;
	}
	
	public function setPassword(string $password) {
		$this->password = $password;
	}
}