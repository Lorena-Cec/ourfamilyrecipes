<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php include('includes/header.php'); ?>

    <header class="hero">
        <div class="hero-content">
            <h1>Simple recipes made for every time of day.</h1>
            <p>Try our simple yet delicious recipes! From make-ahead lunches and midweek 
                meals to side dishes and irresistible cakes, 
                we have everything you need.</p>
                <a href="recipes.php" class="regular-button">Find Recipes</a>
        </div>
    </header>
    
    <section class="features" >
        <h2>We have the perfect recipes for every meal.</h2>
        <div class="meals">
            <div class="feature">
                <a href="recipes.php?meal_type=Breakfast"><img src="images/breakfast.png" alt="breakfast" class="images"></a>
                <h3>Breakfast</h3>
            </div>
            <div class="feature">
                <a href="recipes.php?meal_type=Lunch"><img src="images/lunch.png" alt="breakfast" class="images"></a>
                <h3>Lunch</h3>
            </div>
            <div class="feature">
                <a href="recipes.php?meal_type=Dinner"><img src="images/dinner.png" alt="breakfast" class="images"></a>
                <h3>Dinner</h3>
            </div>
            <div class="feature">
                <a href="recipes.php?meal_type=Dessert"><img src="images/dessert.png" alt="breakfast" class="images"></a>
                <h3>Desserts</h3>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="leftAbout">
            <div class="mainTitle">
                <h2 class="large-text">About Us</h2>
            </div>
            <p class="medium-text">
            Welcome to our recipe-sharing website! We are a family passionate about cooking and sharing delicious meals with others. Our journey with cooking began many years ago, and now we've decided to share our favorite recipes with the world.
            </p>
            <a href="aboutus.php" class="regular-button">More about us</a>
        </div>
        <img src="images/family.jpg" alt="Family smiling" class="image">
    </section>

    <?php include('includes/footer.php'); ?>
  
</body>

</html>
