<?php

use app\core\Application;

class m0008_update_user_table {

    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "ALTER TABLE user
                ADD COLUMN username VARCHAR(255) NOT NULL AFTER `id`";

        $database->pdo->exec($sql);
    
    }
    
}