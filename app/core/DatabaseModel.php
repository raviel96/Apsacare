<?php

namespace app\core;

use Exception;
use PDO;

abstract class DatabaseModel extends Model {
    
    /**
     * Get the table name
     * @return string Return the table name
     */
    abstract public function tableName() :string;

    /**
     * Get the attributes of the model
     * @return array Return an array of attributes
     */
    abstract public function attributes() :array;

    /**
     * Get the primary key
     * @return string Return the name of primary key 
     */
    abstract public function primaryKey() :string;

    /**
     * Insert the model to the table
     * @return bool Return true if the model was successfully insert, false otherwise
     */
    public function insert() {

        try {
            $tableName = $this->tableName();
            $attributes = $this->attributes();

            $params = array_map(fn($attr) => ":$attr", $attributes);
            
            $sql = "INSERT INTO $tableName (".implode(",", $attributes).")
                    VALUES (".implode(",", $params).")";
            
            $statement = self::prepare($sql);
            
            foreach($attributes as $attribute) {
                $statement->bindParam(":$attribute", $this->{$attribute});
            }

            $statement->execute();

            return true;
        }catch(Exception $e) {
            return false;
        }    
    }

    /**
     * @param array $where An array of columns name and their value for the statement 'where' condition
     */
    public function delete(array $where) {
        
        try {
            $tableName = $this->tableName();

            $attributes = array_keys($where);

            $sql = "DELETE FROM $tableName WHERE " 
                    .implode(" AND ",array_map(fn($attr) => "$attr = :$attr", $attributes));
            
            $statement = self::prepare($sql);

            foreach($where as $key => $value) {
                $statement->bindParam(":$key", $value);
            }

            $statement->execute();

            return true;
        }catch(Exception $e) {
            return false;
        }
    
    }

    /**
     * @param array $set Array of columns name and their value to update in the database
     * @param int $id Id of the data
     * @return mixed Return true if the statement was successfully execute. Otherwise return false if potential errors
     */
    public function update(array $set, int $id) {

        try {

            $tableName = $this->tableName();

            $toUpdate = array_keys($set);

            $sql = "UPDATE $tableName
                    SET " .implode(",",array_map(fn($attr) => "$attr = :$attr", $toUpdate)).
                    " WHERE id = :id";

            $statement = self::prepare($sql);

            foreach($set as $key => $value) {
                $statement->bindParam(":$key", $value);
            }

            $statement->bindParam(":id", $id);

            $statement->execute();

            return true;
        }catch(Exception $e) {
            return false;
        }
    
    }

    /**
     * Find one record in the database
     * @param array $where An array of columns name and their value for the statement 'where' condition
     * @example location ["column_name" => "value"]
     * @return mixed Return fetch data. Or false 
     */
    public function findOne(array $where) {
        try{
            $tableName = $this->tableName();

            $attributes = array_keys($where);
            $sql = "SELECT * FROM $tableName WHERE " 
                    .implode(" AND ",array_map(fn($attr) => "$attr = :$attr", $attributes));
            
            $statement = self::prepare($sql);

            foreach($where as $key => $value) {
                $statement->bindParam(":$key", $value);
            }

            $statement->execute();

            return $statement->fetchObject(static::class);
        }catch(Exception $e) {
            return false;
        }
        
    }

    /**
     * Get all record in the dabatase
     * @return mixed Return fetch data. Or false
     */
    public function findAll() {
        try{
            $tableName = $this->tableName();
        
            $sql = "SELECT * FROM $tableName";

            $statement = self::prepare($sql);

            $statement->execute();

            return $statement->fetchObject(static::class);
        }catch(Exception $e) {
            return false;
        }
    }

    public static function prepare($sql) {
        return  Application::$app->getDatabase()->pdo->prepare($sql);
    }

}