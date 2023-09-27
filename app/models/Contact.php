<?php

namespace app\models;

use app\core\DatabaseModel;

class Contact extends DatabaseModel {

    public int $id;
    public string $created_at;
    public string $subject = "";
    public string $status = "";
    public string $lastname = "";
    public string $firstname = "";
    public string $email = "";
    public string $phone = "";
    public string $message = "";
    public bool $legal = false;


    public function tableName(): string {
        return "contact";
    }

    public function attributes(): array
    {
        return [
            "subject", 
            "status", 
            "lastname", 
            "firstname", 
            "email", 
            "phone", 
            "message"
        ];
    }

    public function primaryKey(): string {
        return "id";   
    }

    /**
     * Définie les règles à respecter pour chacun des attributs
     * @return array Retourne un tableau de règles pour chaque attributs
     */
    public function rules():array {
    
        return [
            'subject' => [self::RULE_REQUIRED],
            'status' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED, self::RULE_NAME, self::RULE_MIN],
            'firstname' => [self::RULE_REQUIRED,self::RULE_NAME, self::RULE_MIN],
            'phone' => [self::RULE_REQUIRED, self::RULE_PHONE],
            'legal' => [self::RULE_REQUIRED],
        ];
    }

    public function __destruct() {
        
    }
}