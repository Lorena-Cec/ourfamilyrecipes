<?php
$isLoggedIn = isset($_SESSION['user_id']);
$isAdmin = $isLoggedIn && isset($_SESSION['username']) && $_SESSION['username'] === 'admin';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Our Family Recipes</title>
</head>
<body>
    <nav>
        <img src="images/logo.png" alt="Logo" class="logo">
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar" id="bar1"></span>
            <span class="bar" id="bar2"></span>
            <span class="bar" id="bar3"></span>
        </div>
        <ul class="nav-links" id="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="recipes.php">Recipes</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <?php if ($isAdmin): ?>
                <li><a href="addrecipes.php">Add recipes</a></li>
            <?php else: ?>
                <li><a href="profile.php">Profile</a></li>
            <?php endif; ?>
            <?php if ($isLoggedIn): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <script>
      
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.getElementById('nav-links');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');

        mobileMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileMenu.classList.toggle('open');

            if (mobileMenu.classList.contains('open')) { //makes X from 3 lines
                bar1.style.transform = 'rotate(-45deg) translate(-9px, 6px)';
                bar2.style.opacity = '0';
                bar3.style.transform = 'rotate(45deg) translate(-9px, -6px)';
            } else {
                bar1.style.transform = 'rotate(0) translate(0, 0)';
                bar2.style.opacity = '1';
                bar3.style.transform = 'rotate(0) translate(0, 0)';
            }
        });
    </script>
</body>
</html>
