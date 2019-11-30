<?php


class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME,DB_PASSWORD);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public static function GetInstance() : Database{
        if(Database::$instance === null){
            Database::$instance = new Database();
        }

        return Database::$instance;
    }

    public function Insert($table, $values){
        $questionMarks = Utils::GetNQuestionMarks(count($values));
        $query = 'INSERT INTO ' . $table  . ' VALUES (' . $questionMarks . ')';

        return $this->runQuery($query, $values);
    }

    public function Select($table, $column, $conditions, $params){
        $query = 'SELECT ' . $column . ' FROM ' . $table . ' WHERE ' . $conditions;
        return $this->runQuery($query, $params);
    }

    private function runQuery($query, $params){
        $query = $this->pdo->prepare($query);
        if($query){
            for ($i = 0; $i < count($params); $i++) {
                $query->bindValue($i + 1, $params[$i]);
            }

            if($query->execute()){
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }

        return false;
    }
}