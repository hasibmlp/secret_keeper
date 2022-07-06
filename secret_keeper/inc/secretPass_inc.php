<?php
session_start();

if(isset($_POST['submit'])) {

    $body = $_POST['secrets'];
    $userId = $_SESSION['userId'];
    
    require_once '../config/database.php';
    require_once 'functions_inc.php';


    if (emptyTextarea($body) !== false)  {
        header ('location: ../index.php?error=emptyinput');
        exit();
    }

    secretPass ($conn, $body, $userId);
    

}else {
    header('location: ../index.php');
    exit();
}