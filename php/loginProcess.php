<!-- This file processes the login form submission and checks the credentials against the database -->

<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "portfolio");

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

if ($user && $password == $user['password']) {
    // Login successful
    $_SESSION['email'] = $email;
    header("Location: addEntry.php");
    exit();
} else {
    // Login failed
    header("Location: login.php?error=Invalid credentials");
    exit();
}
?>