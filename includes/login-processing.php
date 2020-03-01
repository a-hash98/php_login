<?php

#check if user has clicked the 'log in' button
if (isset($_POST['login-submit'])) {

    require 'db-handler.php';

    #sign in with either the email or the username
    $mailuid = $POST['mailuid'];
    $mailuid = $POST['password'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        
        exit()
    }

    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";
    $statement = mysqli_stmt_init($connection);
    
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("Location: ../index.php?error=sqlerror");

        exit()
    }

    mysqli_stmt_bind_param($statement, "ss", $mailuid, $mailuid);
    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);
    #putting the result into an associative array to make it legible for PHP
    #only check if password matches if username exists in DB
    if ($row = mysqli_fetch_assoc($result)) {
        #password_verify() compares hashes of the passwords, returns a boolean
        $passwordCheck = password_verify($password, $row['pwdUsers']);

        if ($passwordCheck == false) {
            header("Location: ../index.php?error=wrongpwd");
            
            exit();
        }

        #session variable
        session_start();
        $_SESSION['userId'] = $row['idUsers'];
        $_SESSION['userUid'] = $row['uidUsers'];

        header("Location: ../index.php?login=success");



    } else {
        #username doesn't exist in DB
        header("Location: ../index.php?error=nouser");
        exit()
    }
}

header("Location: .../index.php");