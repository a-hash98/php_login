<?php

#check if user has clicked the 'sign up' button
if (isset($_POST['signup-submit'])) {
    
    require 'db-handler.php';

    #fetch info from form to post to DB based on the 'name' values of the input fields

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    #error handlers
    

    #handles empty fields
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match()) {
        header("Location: ../signup.php?
        error=emptyfields&uid=".$username."&mail=".$email);

        #exit function prevents code below it from being executed
        exit();
    }

    #handles invalid email address and username
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
        header("Location: ../signup.php?
        error=invalidmailuid");

        exit();
    }

    #handles invalid email address only
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?
        error=invalidmail&uid=".$username);

        exit();
    }

    #handles invalid username only
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?
        error=invaliduid&mail=".$email);

        exit();
    }

    #handles unidentical passwords
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?
        error=-passwordcheck&uid=".$username."&mail=".$email);
        
        exit();

    }

    

    #handles username that already exists in the DB e.g. belongs to another user
else {
        $sql = "SELECT uidUsers from users WHERE uidUsers=?";
        
        $statement = mysqli_stmt_init($connection);
        #handling potentially invalid connection
        if (!mysqli_stmt_prepare($statement, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            
            exit();
        }

        
            #bind user info to send to DB
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $resultCheck = mysqli_stmt_num_rows($statement);

            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usernametakend&mail=".$email);

                exit();
            }
            
        #end of error handling

        
                #SQL statement to insert valid user data into DB      
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";

                $statement = mysqli_stmt_init($connection);
                
                #handling potentially invalid connection
                if (!mysqli_stmt_prepare($statement, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                    
                    exit();

                }      
        
            

                    #hashing the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($statement, "sss", $username, $email, $password);
                    mysqli_stmt_execute($statement);
                    header("Location: ../signup.php?signup=success");
                    
                    exit();

            

    #close the connection
    mysqli_statement_close($statement);
    mysqli_close($connection);





}
} 
