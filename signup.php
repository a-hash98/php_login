<?php
    require "header.php"
?>

    <main>
        <h1>Sign Up</h1>
        
        <form action="includes/signup-processing.php" method="post">
            <input type="text" name="uid" placeholder="username">
            <input type="text" name="mail" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="password" name="password-repeat" placeholder="confirm password">

            <button type="submit" name="signup-submit">Sign Up</button>
        </form>
    </main>

<?php
    require "footer.php"
?>