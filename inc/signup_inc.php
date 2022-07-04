<?php 
if (isset($_POST['submit'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pass = $_POST['pass'];
    $passRep = $_POST['pass_rep'];

 
require_once '../config/database.php';
require_once 'functions_inc.php';



 if (emptyInputSighnup($name, $email, $uid, $pass, $passRep) !== false) {
    header('location: ../index.php?error=emptyInput');
    exit();
 }

 if (invalidEmail($email) !== false) {
    header('location: #?error=invalidEmail');

    exit();
 }
 if (invalidUid($uid) !== false) {
    header('location: ../index.php?invalidUid');

    exit();
 }
 if (passMatch($pass, $passRep) !== false) {
    header('location: ../index.php?error=passNotMatch');

    exit();
 }
 if (uidExists($conn, $uid, $email) !== false) {
    header('location: #?error=uidExists');

    exit();
 }

 createUser($conn, $name, $email, $uid, $pass);




}else {
    header('location: ../index.php');
    exit();
}