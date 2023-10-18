<?php

namespace app\models;
use app\core\DatabaseModel;

class User extends DatabaseModel {

    public int $id;
    public string $created_at;
    public string $username = "";
    public string $email = "";
    public string $password = "";
    public ?int $courseId;
    public string $role = "ROLE_USER";

    public function tableName(): string {
        return "user";
    }

    public function attributes(): array
    {
        return [
            "username",
            "email",
            "password",
            "role"
        ];
    }

    public function primaryKey(): string {
        return "id";   
    }

    public function rules():array {
        return [];
    }

    public function save() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return $this->insert();
    }

    
}