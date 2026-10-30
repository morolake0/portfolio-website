<!-- This page processes the form submission from addEntry.php to add a new blog post to the database. -->

<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$connection = mysqli_connect("localhost", "root", "", "portfolio");

$title = $_POST['entryTitle'];
$content = $_POST['entryContent'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO posts (title, content, created_at) VALUES ('$title', '$content', '$date')";
mysqli_query($connection, $query);

header("Location: viewBlog.php");
exit();

?>