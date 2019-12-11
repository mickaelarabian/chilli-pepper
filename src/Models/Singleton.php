<?php

require_once '../src/Models/EnvReader.php';

class Singleton extends EnvReader
{

    public $cnx;
    private static $instance;
    private $dbName;
    private $host;
    private $username;
    private $password;

    private function __construct()
    {
        parent::__construct();
        $this->host = $this->getValue("DATABASE_HOST");
        $this->dbName = $this->getValue("DATABASE_DBNAME");
        $this->username = $this->getValue("DATABASE_USERNAME");
        $this->password = $this->getValue("DATABASE_PASSWORD");
        $this->cnx = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
    }

    /**
     * Retourne l'unique instance du singleton
     *
     * @return Singleton
     */
    public static function getInstance(): Singleton
    {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
