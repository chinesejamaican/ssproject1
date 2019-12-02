<?php

/**
 * @author Hoang Doan
 */
class DbConnect
{

    /**
     * database host
     */
    const DB_HOST = 'localhost';

    /**
     * database name
     */
    const DB_NAME = 'entertainment';

    /**
     * database user
     */
    const DB_USER = 'root';

    /*
     * database password
     */
    const DB_PASSWORD = '';

    private $pdo = null;

    public function getPdo()
    {
        return $this->pdo;
    }

    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Open the database connection
     */
    public function __construct()
    {
        // open database connection
        $conStr = sprintf("mysql:host=%s;", self::DB_HOST);
        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * close the database connection
     */
    public function __destruct()
    {
        // close the database connection
        $this->pdo = null;
    }

    public function getDbEntertainmnet()
    {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
        try {
            $this->pdo = new PDO($conStr, "admin", "Pa11word");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

