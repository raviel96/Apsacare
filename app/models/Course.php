<?php

namespace app\models;

use app\core\Application;
use app\core\DatabaseModel;
use Exception;

class Course extends DatabaseModel {

    public int $id;
    public string $created_at;
    public string $title = "";
    public string $description = "";
    public string $acquired = "";
    public string $objective = "";
    public string $program = "";
    public string $duration = "";
    public string $pdf = "";
    public int $categoryId;

    public function tableName(): string {
        return "course";
    }

    public function attributes(): array
    {
        return [
            "title",
            "description",
            "acquired",
            "objective",
            "program",
            "duration",
            "pdf",
            "categoryId"
        ];
    }

    public function primaryKey(): string {
        return "id";   
    }

    public function rules():array {
        return [];
    }

    public function getCategory($id) {
        $database = Application::$app->getDatabase();
        
        try {
            $sql = "SELECT `name` FROM category WHERE id = :id";

            $statement = $database->pdo->prepare($sql);
    
            $statement->bindParam(":id", $id);
    
            $statement->execute();
            
            return $statement->fetch()[0];
        } catch(Exception $e) {
            return false;
        }
        

    }
    
}