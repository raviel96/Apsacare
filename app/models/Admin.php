<?php

namespace app\models;

class Admin {
    
    private string $adminMail = "";
    private string $adminMailPwd = "";

    public function __construct(array $config) {
        $this->setAdminMail($config['mail'] ?? "");
        $this->setAdminMailPwd($config['mail_pwd'] ?? "");
    }

	public function getAdminMail(): string {
		return $this->adminMail;
	}
	
	public function setAdminMail(string $adminMail){
		$this->adminMail = $adminMail;
	}

	public function getAdminMailPwd(): string {
		return $this->adminMailPwd;
	}
	
	public function setAdminMailPwd(string $adminMailPwd){
		$this->adminMailPwd = $adminMailPwd;
	}
}