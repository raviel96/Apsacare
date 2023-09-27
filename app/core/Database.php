<?php
namespace app\core;

use PDO;

class Database {

    public PDO $pdo;

    public function __construct(array $config) {

        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }   

    /**
     * Scan the migration folder to get all migration files.
     * Call the "up()" function of a migration add the migration to the migration table.
     * If the migration is already in the table, it will not be apply again
     */
    public function applyMigrations() {
        $this->createMigrationTable();
        $applieMigrations = $this->getAppliedMigrations();


        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR."/migrations");
        $toApplyMigrations = array_diff($files, $applieMigrations);

        foreach($toApplyMigrations as $migration) {
            if($migration == "." || $migration == "..") continue;

            require_once Application::$ROOT_DIR."/migrations/$migration";
            $className = pathinfo($migration, PATHINFO_FILENAME);
            
            $instance = new $className();
            $instance->up();

            $newMigrations[] = $migration;
        }

        if(!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied.");
        }
    }

    /**
     * Create migration table
     */
    public function createMigrationTable() {
        $sql = "CREATE TABLE IF NOT EXISTS migration(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;";

        $this->pdo->exec($sql);
    }

    /**
     * Get migrations that are already applied
     * @return mixed Array of all migration
     */
    public function getAppliedMigrations() {
        $sql = "SELECT migration FROM migration";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Insert migrations in the table
     */
    public function saveMigrations(array $migrations) {
        $str = implode(",", array_map(fn($m) => "('$m')", $migrations));

        $sql = "INSERT INTO migration(migration) VALUES $str";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    protected function log($message) {
        echo "[".date("Y-m-d H:i:s")."] - ".$message.PHP_EOL;
    }
}