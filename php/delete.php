<!-- This page handles the deletion of blog posts and comments -->

<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$connection = mysqli_connect("localhost", "root", "", "portfolio");

if (isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];

    if ($type == "post") {
        $query = "DELETE FROM posts WHERE id = '$id'";
        mysqli_query($connection, $query);
    } else if ($type == "comment") {
        $query = "DELETE FROM comments WHERE id = '$id'";
        mysqli_query($connection, $query);
    }
}

header("Location: viewBlog.php");

exit();
?>