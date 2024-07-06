<?php
namespace task3\Classes;

class DataBase
{
    protected $conn = null;
    private $host = DBHOST;
    private $dbname = DBNAME;
    private $user = DBUSER;
    private $password = DBPASS;

    private $error;

    public function __construct()
    {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8";
        try {
            $this->conn = new \PDO($dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            $this->conn = null;
            $this->error = $e->getMessage();
        }
    }

    public function getError()
    {
        return $this->_error;
    }
}