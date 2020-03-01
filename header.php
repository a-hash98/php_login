<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="description" content="Meta description">
    <meta name=viewport content="width=device-width, intiial-scale=1">
    <title></title>
    </head>

    <body>
        <header>
            <!-- <nav>
            <a href="#">
                <img src="images/abc" alt="logo">
            </a>
            <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">About me</a></li>
            <li><a href="#">Contact</a></li>
            </ul>
            </nav> -->

            <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">About me</a></li>
            <li><a href="#">Contact</a></li>
            </ul>
            
            <div>
                <form action="includes/login.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username or email">
                    <input type="password" name="password" placeholder="password">
                    <button type="submit" name="login-submit">log in</button>
                </form>

                <a href="signup.php">Sign Up</a>

                <form action="includes/logout.php" method="post">
                    <button type="submit" name="logout-submit">log out</button>
                </form>


                
            </div>
        </header>

    <!-- </body>

</html> -->