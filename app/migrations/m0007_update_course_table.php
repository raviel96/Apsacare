<?php

use app\core\Application;

class m0007_update_course_table {

    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "ALTER TABLE course
                ADD COLUMN title VARCHAR(255) NOT NULL AFTER `id`";

        $database->pdo->exec($sql);
    
    }

}