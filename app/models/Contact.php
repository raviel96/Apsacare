<?php

namespace app\models;
use app\core\Model;

class Contact extends Model {

    public string $lastname = "";
    public string $firstname = "";
    public string $email = "";
    public string $phone = "";
    public string $message = "";
    public bool $legal = false;

    public function rules():array {
    
        return [
            'lastname' => [self::RULE_REQUIRED],
            'firstname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'message' => [self::RULE_REQUIRED],
            'legal' => [self::RULE_REQUIRED],
        ];
    }
}