<?php

$db_host = 'localhost';
$db_user = 'hsb';
$db_pass = '123456';
$db_name = 'php_project01';
 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$conn) {
    die('connection error' . mysqli_connect_error());
}
