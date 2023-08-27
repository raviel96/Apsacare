<?php

namespace app\models;

class Admin {
    
    private string $adminMail = "";
    private string $adminPwd = "";

    public function __construct(array $config) {
        $this->setAdminMail($config['mail'] ?? "");
        $this->setAdminPwd($config['pwd'] ?? "");
    }

	public function getAdminMail(): string {
		return $this->adminMail;
	}
	
	public function setAdminMail(string $adminMail){
		$this->adminMail = $adminMail;
	}

	public function getAdminPwd(): string {
		return $this->adminPwd;
	}
	
	public function setAdminPwd(string $adminPwd){
		$this->adminPwd = $adminPwd;
	}
}