<?php
## Adapted from MVC Tutorium with Philip Braunen

namespace App\Models;

use PDO;
use Exception;

/**
 * Class Database
 * @package App\Models
 */
// Facilitates communication with DB
class Database
{
    ####!!!! Alter Database Information HERE, If Running App on New Server !!!!!#####
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = 'root';
    private $dbName = 'Garten_App';

    private $pdo;
    private $statement;
    private $table;

    //creates PDO with parameters above
    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Query DB without return
    public function query($sql, $values = [])
    {
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute($values);
    }

    // Query DB with return
    public function queryStatement($sql, $values = [])
    {
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute($values);

        return $this;
    }

    // Set table for where() method
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    // Select from DB with given parameters
    public function where($field, $operator, $value)
    {
        $this->query("SELECT * FROM $this->table WHERE $field $operator ?", [ $value ]);

        return $this;
    }

    // Get rowCount of returned PDO statement from DB
    public function count()
    {
        return $this->statement->rowCount();
    }

    // Get assoc. array of returned PDO statement from DB
    public function results()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get first array of results() method
    public function first()
    {
        return $this->results()[0];
    }
}