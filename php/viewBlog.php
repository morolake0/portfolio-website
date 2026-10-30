<!-- This page displays the blog entries on the portfolio website. 
It retrieves posts from the database, sorts them by date, and groups them by month for filtering. 
Users can view all posts or filter by month using a dropdown menu. 
Each post displays its title, content, and creation date, along with any comments. 
If the user is logged in, they can also delete posts and comments.
-->

<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "portfolio");
$query = "SELECT * FROM posts";
$result = mysqli_query($connection, $query);

$posts = [];
while ($post = mysqli_fetch_assoc($result)) {
    $posts[] = $post;
}

for ($i = 0; $i < count($posts) - 1; $i++) {
    for ($j = 0; $j < count($posts) - $i - 1; $j++) {
        if (strtotime($posts[$j]['created_at']) < strtotime($posts[$j + 1]['created_at'])) {
            $temp = $posts[$j];
            $posts[$j] = $posts[$j + 1];
            $posts[$j + 1] = $temp;
        }
    }
}

if (count($posts) == 0 && !isset($_GET['month'])) {
    header("Location: login.php");
    exit();
}

$groupedPosts = [];
foreach ($posts as $post) {
    $monthYear = date("F Y", strtotime($post['created_at']));
    $groupedPosts[$monthYear][] = $post;
}

if (isset($_GET['month']) && $_GET['month'] != "") {
    $posts = $groupedPosts[$_GET['month']];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog — Morolake Odubiyi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/blog.css">
</head>

<body>

    <nav>
        <span class="nav-name">Morolake Odubiyi</span>
        <ul>
            <li><a href="index.php">← Back to Homepage</a></li>
            <li><a href="../html/educational.html">Education</a></li>
            <li><a href="../html/portfolio.html">Portfolio</a></li>
            <li><a href="../html/skills.html">Skills</a></li>
        </ul>
    </nav>

    <header>
        <div id="headline">
            <div id="headline-left">
                <h1>Morolake Odubiyi</h1>
                <p id="tagline">Aspiring Software Developer | Computer Science Student</p>
            </div>
            <div id="headline-chips">
                <span class="chip">🎓 BSc Computer Science</span>
                <span class="chip">🏛 Queen Mary University of London</span>
                <span class="chip">📍 London, UK</span>
            </div>
        </div>
        <div id="header-text">
            <h2>My Blog</h2>
            <p>Thoughts and updates from my journey in Computer Science.</p>
        </div>
    </header>

    <main>

        <div class="card">
            <h3>Welcome</h3>
            <p>
                Here you will find blog entries about my experiences, projects, and thoughts
                as I progress through my Computer Science degree at Queen Mary University of London.
                Entries are added regularly - check back soon for updates.
            </p>
        </div>


        <a href="login.php" class="add-post-link">Add Post</a>

        <form method="get" action="viewBlog.php">
            <select name="month" onchange="this.form.submit()">
                <option value="">All Posts</option>
                <?php foreach ($groupedPosts as $monthYear => $monthPosts) { ?>
                    <option value="<?php echo $monthYear; ?>" 
                        <?php if (isset($_GET['month']) && $_GET['month'] == $monthYear) echo 'selected'; ?>>
                        <?php echo $monthYear; ?>
                    </option>
                <?php } ?>
            </select>
        </form>


        <div id="blog-entries">
            <?php foreach ($posts as $post) { ?>
                <hr>
                <div class="blog-post">
                    <p class="post-date"><?php echo $post['created_at']; ?></p>
                    <h3 class="post-title"><?php echo $post['title']; ?></h3>
                    <p class="post-content"><?php echo $post['content']; ?></p>

                    <?php if (isset($_SESSION['email'])) { ?>
                        <a href="delete.php?type=post&id=<?php echo $post['id']; ?>" class="delete-link">Delete Post</a>
                    <?php } ?>

                    <div class="comments">
                        <?php
                        $post_id = $post['id'];
                        $comment_query = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY created_at DESC";
                        $comment_result = mysqli_query($connection, $comment_query);
                        while ($comment = mysqli_fetch_assoc($comment_result)) {
                            echo "<p><strong>" . $comment['name'] . ":</strong> " . $comment['comment'] . "</p>";
                            echo "<p id='comment-date'>" . $comment['created_at'] . "</p>";
                            if (isset($_SESSION['email'])) {
                                echo "<a href='delete.php?type=comment&id=" . $comment['id'] . "' class='delete-link'>Delete Comment</a>";
                            }
                        }
                        ?>
                        
                        <form action="addComment.php" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            <input type="text" name="name" placeholder="Your name...">
                            <input type="text" name="comment_content" placeholder="Add a comment...">
                            <button type="submit">Comment</button>
                        </form>
                    </div>

                </div>
            <?php } ?>
        </div>


    </main>

    <footer>
        <div>
            <p class="footer-label">Contact Information</p>
            <ul>
                <li>Email: <a href="mailto:morolakeodubiyi@gmail.com">morolakeodubiyi@gmail.com</a></li>
                <li>Phone: +44 904463882</li>
                <li>LinkedIn: <a href="https://www.linkedin.com/in/morolake-odubiyi-69083a280">linkedin.com/in/morolake-odubiyi</a></li>
            </ul>
            <p id="trademark">© 2026 Morolake Odubiyi</p>
        </div>
    </footer>

</body>
</html>

