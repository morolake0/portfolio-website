<!-- Logout script to end the user session and redirect to login page -->

<?php
session_start();
unset($_SESSION['email']);
session_destroy();
header("Location: ../html/index.html");
exit();
?>