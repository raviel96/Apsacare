<?php

use app\core\Application;


class m0006_update_user_table {
    
    public function up() {
        $database = Application::$app->getDatabase();

        $sql = "ALTER TABLE user
                ADD COLUMN `role` VARCHAR(50) NOT NULL AFTER `password`";

        $database->pdo->exec($sql);
    }

    public function down() {
        $database = Application::$app->getDatabase();

        $sql = "ALTER TABLE user
                DROP COLUMN `role`";

        $database->pdo->exec($sql);
    }

}