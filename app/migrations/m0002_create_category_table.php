<?php

use app\core\Application;

class m0002_create_category_table {

    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "CREATE TABLE IF NOT EXISTS category(
                id INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )ENGINE=INNODB;";

        $database->pdo->exec($sql);
    
    }

    public function down() {
        $database = Application::$app->getDatabase();

        $sql = "DROP TABLE category";

        $database->pdo->exec($sql);
    
    }
    
}