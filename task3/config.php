<?php

if(file_exists('vendor/autoload.php')){
    require_once 'vendor/autoload.php';
}

defined('DBHOST') or define('DBHOST', 'localhost');
defined('DBNAME') or define('DBNAME', 'intervolga');
defined('DBUSER') or define('DBUSER', 'root');
defined('DBPASS') or define('DBPASS', '111');