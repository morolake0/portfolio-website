<!-- This page provides a login form for users to access the blog management features of the portfolio website. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Morolake Odubiyi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/mobile_index.css" media="screen and (max-width: 768px)">
</head>

<body>

    <nav>
        <span class="nav-name">Morolake Odubiyi</span>
        <ul>
            <li><a href="index.php">← Back to Homepage</a></li>
            <li><a href="../html/educational.html">Education</a></li>
            <li><a href="../html/portfolio.html">Portfolio</a></li>
            <li><a href="../html/skills.html">Skills</a></li>
            <li><a href="../html/blog.html">Blog</a></li>
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
            <h2>Login</h2>
            <p>Please log in to add a new blog entry.</p>
        </div>
    </header>

    <main>
        <div class="form-card">
            <h3>Blog Login</h3>
            <form action="loginProcess.php" method="post">

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <?php
                if (isset($_GET['error'])) {
                    echo "<p class='error-msg'>" . $_GET['error'] . "</p>";
                }
                ?>

                <button type="submit" class="submit-button">Login</button>

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