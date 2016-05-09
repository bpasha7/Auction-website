<?php
require_once 'config_schema.php';
require_once 'db.php';

// подключаемся к БД
$obj=db_connect(DBHOST, DBUSER, DBPASSWD, DBNAME);
?>