<!-- This page allows the user to add a new blog entry. 
It checks if the user is logged in by verifying the session variable 'email'. 
If the user is not logged in, they are redirected to the login page. 
The page includes a form for entering the title and content of the blog entry, 
which is submitted to 'addPost.php' for processing. 
-->

<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Entry — Morolake Odubiyi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/addEntry.css">

<script src="../js/addEntry.js" defer></script>

</head>

<body>

    <nav>
        <span class="nav-name">Morolake Odubiyi</span>
        <ul>
            <li><a href="index.php">← Back to Homepage</a></li>
            <li><a href="../html/educational.html">Education</a></li>
            <li><a href="../html/portfolio.html">Portfolio</a></li>
            <li><a href="../html/skills.html">Skills</a></li>
            <li><a href="../php/viewBlog.php">Blog</a></li>
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
            <h2>Add Blog Entry</h2>
            <p>Write and post a new entry to your blog.</p>
        </div>
    </header>

    <main>
        <p class="welcome-msg">Welcome, <?php echo $_SESSION['email']; ?> | <a href="logout.php">Logout</a></p>
        <div class="form-card">
            <h3>New Blog Entry</h3>
            <form action="addPost.php" method="post">

                <div class="form-group">
                    <label for="entryTitle">Title</label>
                    <input type="text" id="entryTitle" name="entryTitle" placeholder="Enter a title for your post">
                    <span class="error-msg" id="title-error"></span>
                </div>

                <div class="form-group">
                    <label for="entryContent">Content</label>
                    <textarea id="entryContent" name="entryContent" placeholder="Write your blog entry here..." ></textarea>
                    <span class="error-msg" id="content-error"></span>
                </div>

                <div class="button-row">
                    <button type="submit" id="button-post">Post</button>
                    <button type="button" id="button-clear">Clear</button>
                </div>

            </form>
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