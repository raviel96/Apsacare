<?php

use app\core\Application;

class m0003_create_course_table {

    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "CREATE TABLE IF NOT EXISTS course(
                id INT AUTO_INCREMENT PRIMARY KEY,
                `description` TEXT NOT NULL,
                acquired TEXT NOT NULL,
                objective TEXT NOT NULL,
                program TEXT NOT NULL,
                duration VARCHAR(255) NOT NULL,
                pdf VARCHAR(255) NOT NULL,
                categoryId INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY(categoryId) REFERENCES category(id)
                )ENGINE=INNODB;";

        $database->pdo->exec($sql);
    }

    public function down() {
        $database = Application::$app->getDatabase();

        $sql = "DROP TABLE course";

        $database->pdo->exec($sql);
    }
    
}