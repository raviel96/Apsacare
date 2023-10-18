<?php

use app\core\Application;

class m0005_create_admin_table {
   
    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "CREATE TABLE IF NOT EXISTS `admin`(
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;";
        
        $database->pdo->exec($sql);
    
    }

    public function down() {
        $database = Application::$app->getDatabase();

        $sql = "DROP TABLE admin";

        $database->pdo->exec($sql);
    
    }
    
}