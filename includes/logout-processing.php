<?php 

session_start();
#deletes contents assigned to the session variables in the last session
session_unset();
session_destroy();
header("Location: ../index.php");

?>
