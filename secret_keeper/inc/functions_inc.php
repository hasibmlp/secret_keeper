<?php
session_start();

function emptyInputSighnup($name, $email, $uid, $pass, $passRep) {
    $result;
    if (empty($name) || empty($email) || empty($uid) || empty($pass) || empty($passRep)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;

    }else {
        $result = false;

    }
    return $result;
}
function invalidUid($uid) {
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function passMatch($pass, $passRep) {
    $result;

    if ($pass !== $passRep) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $uid, $email) {
    
    $sql = 'SELECT * FROM users WHERE userUid = ? OR userEmail = ?;';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../index.php?error=stfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);

    $resultSet = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($resultSet)) {

        return $row;
    }else {
        $result = false;
        return $result;
    }
mysqli_stmt_close($stmt);
    
}
function createUser($conn, $name, $email, $uid, $pass) {
    
    $sql = 'INSERT INTO users (userName, userEmail, userUid, userPass) VALUES (?, ?, ?, ?);';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../index.php?error=stfailed');
        exit();
    }

    $hasedPass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $hasedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../index.php?error=none');



    }


    function emptyInputLogin($username, $pass) {
        $result;
        if (empty($username) || empty($pass)) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pass) {
    
        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header('location: ../index.php?error=uidNotExists');
            exit();
        }

        $passHashed = $uidExists['userPass'];
        $checkPass = password_verify($pass, $passHashed);
        if ($checkPass == false) {
            header('location: ../index.php?error=passNotMatch');
            exit();
        }else if ($checkPass == true) {
            $_SESSION['userId'] = $uidExists['userId'];
            $_SESSION['userName'] = $uidExists['userName'];
            header('location: ../index.php?error=no');
            exit();

        }
    
        
    
    }

    function emptyTextarea($body) {
        $result;
        if (empty($body)) {
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    }

function secretPass ($conn, $body, $userId) {
    echo $body;
    $userId = (int)$userId;
    $sql = "INSERT INTO secrets (postId, postContent, timeDate, userId) VALUES (NULL, '$body', CURRENT_TIME(), '$userId');";
    if (mysqli_query($conn, $sql)) {
        // success
        header('location: ../index.php');

    }else {
        echo 'Error: ' . mysqli_error($conn);

        exit();
    }
}
    
    

