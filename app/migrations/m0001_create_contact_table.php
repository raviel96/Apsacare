<?php

use app\core\Application;

class m0001_create_contact_table {
    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "CREATE TABLE IF NOT EXISTS contact(
                id INT AUTO_INCREMENT PRIMARY KEY,
                `subject` VARCHAR(255) NOT NULL,
                `status` VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                email VARCHAR(255),
                phone VARCHAR(255) NOT NULL,
                `message` TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=INNODB;";


        $database->pdo->exec($sql);
    }
    public function down() {
        
        $database = Application::$app->getDatabase();

        $sql = "DROP TABLE contact";

        $database->pdo->exec($sql);
    }  
}