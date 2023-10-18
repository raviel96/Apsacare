<?php

namespace app\models;
use app\core\DatabaseModel;

class Category extends DatabaseModel {

    public int $id;
    public string $created_at;
    public string $name;


    public function tableName(): string {
        return "category";
    }

    public function attributes(): array
    {
        return [
            "name"
        ];
    }

    public function primaryKey(): string {
        return "id";   
    }

    public function rules():array {
        return [];
    }

    
}