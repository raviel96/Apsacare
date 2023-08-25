<?php

namespace app\models;
use app\core\Model;

class Contact extends Model {

    public string $subject = "";
    public string $status = "";
    public string $lastname = "";
    public string $firstname = "";
    public string $email = "";
    public string $phone = "";
    public string $message = "";
    public bool $legal = false;

    public function rules():array {
    
        return [
            'subject' => [self::RULE_REQUIRED],
            'status' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'firstname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'message' => [self::RULE_REQUIRED],
            'legal' => [self::RULE_REQUIRED],
        ];
    }
}