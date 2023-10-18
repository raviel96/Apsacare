<?php

use app\core\Application;

class m0004_create_user_table {
    
    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "CREATE TABLE IF NOT EXISTS user(
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                `role` VARCHAR(50) NOT NULL,
                courseId INT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY(courseId) REFERENCES course(id)
                )ENGINE=INNODB;";
    
        $database->pdo->exec($sql);
    }

    public function down() {
        
        $database = Application::$app->getDatabase();

        $sql = "DROP TABLE user";

        $database->pdo->exec($sql);
    }
    
}