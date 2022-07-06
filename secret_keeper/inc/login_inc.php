<?php

if (isset($_POST['submit'])) {


   echo $username = $_POST['lname'];
   echo $pass = $_POST['lpass'];


    require_once '../config/database.php';
    require_once 'functions_inc.php';

    if (emptyInputLogin($username, $pass)) {
        header('location: ../index.php?error=emptyInput');
        exit();
     }

     loginUser($conn, $username, $pass);

}else {
        header('location: ../index.php');
        exit();
}
    