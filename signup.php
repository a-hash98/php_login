<?php
    require "header.php"
?>

    <main>
        <h1>Sign Up</h1>
        <!-- error messages for user, depending on the error type shown by the url -->
        <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields"){
                    echo '<p> Please complete all fields. </p>';
                }
                else if ($_GET['error'] == "invalidmailuid"){
                    echo '<p> Please enter a valid email address & username. </p>';

                }
                else if ($_GET['error'] == "invaliduid"){
                    echo '<p> Please enter a valid username. </p>';

                }
                else if ($_GET['error'] == "invalidmail"){
                    echo '<p> Please complete all fields. </p>';

                } 
                else if ($_GET['error'] == "passwordcheck"){
                    echo '<p> Passwords do not match. </p>';

                }
                else if ($_GET['error'] == "usertaken"){
                    echo '<p> Username already exists. </p>';

                }

            } else {
                echo '<p> Signed up successfully! </p>';

            }

            ?>
       
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