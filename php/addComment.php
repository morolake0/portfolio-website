<!-- posts a comment to the database and redirects back to the blog page -->

<?php
$connection = mysqli_connect("localhost", "root", "", "portfolio");

$post_id = $_POST['post_id'];
$name = $_POST['name'];
$comment_content = $_POST['comment_content'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO comments (post_id, name, comment, created_at) VALUES ('$post_id', '$name', '$comment_content', '$date')";
mysqli_query($connection, $query);

header("Location: viewBlog.php");
exit();
?>