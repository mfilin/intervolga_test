<?php
namespace task3\Classes;

class Validator
{
    private $db;
    public $errors = [];

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function checkEmpty($name, $value)
    {
        $name = ucfirst(str_replace("_", " ", $name));
        if (empty($value)) {
            return $this->errors[] = "Please enter ".$name;
        } else {
            return 0;
        }
    }    
}