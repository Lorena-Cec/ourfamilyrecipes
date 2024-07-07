<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aboutus.css">
    <title>About Us</title>
</head>
<body>

<?php include('includes/header.php'); ?>

<main>
    <section class="about-us">
        <div class="intro-text">
            <div class="mainTitle">
                <h2 class="large-text">About Us</h2>
            </div>
            <p class="medium-text">Welcome to our recipe-sharing website! In our kitchen, you'll find a variety of recipes, from traditional family dishes to modern culinary creations. Each recipe is carefully tested and tried in our home to ensure every meal is perfect.</p>
            <p class="medium-text">Whether you're looking for simple weekday recipes, special dishes for family gatherings, or sweet treats to indulge in, you'll find everything you need here. Our passion for cooking and love for food drives us to create flavorful and inspiring dishes that we share with you.</p>
            <p class="medium-text">Thank you for being part of our culinary community. We hope you enjoy our recipes as much as we enjoy creating them!</p>
            <p class="medium-text">With love,<br>Our Family Recipes team</p>
        </div>
        <img src="images/family-cooking.jpg" alt="Family Cooking" class="family-photo">
    </section>
    <h2>Meet Our Family</h2>
    <section class="about-family">
        
        <div class="about-member">
            <img src="images/mom.png" alt="Mom" class="member-photo">
            <div class="member-info">
                <h3 class="large-text">Mom</h3>
                <p class="medium-text">The head chef and recipe creator. She brings tradition and creativity to the kitchen.</p>
                <p class="medium-text">Mom has always been passionate about cooking, drawing inspiration from her mother's recipes. She loves experimenting with new ingredients and techniques to create unique dishes.</p>
            </div>
        </div>
        <div class="about-member">
            
            <div class="member-info">
                <h3 class="large-text">Dad</h3>
                <p class="medium-text">The sous chef and grilling expert. He ensures everything runs smoothly and adds his unique flavors.</p>
                <p class="medium-text">Dad's love for grilling and barbecuing brings a smoky flavor to our dishes. He's also the family handyman, always ready to help with kitchen renovations and improvements.</p>
            </div>
            <img src="images/dad.png" alt="Dad" class="member-photo">
        </div>
        <div class="about-member">
            <img src="images/daughter.png" alt="Daughter" class="member-photo">
            <div class="member-info">
                <h3 class="large-text">Daughter</h3>
                <p class="medium-text">The aspiring young chef who loves baking and decorating. She brings joy and fun to our cooking sessions.</p>
                <p class="medium-text">Daughter's creativity shines through her beautifully decorated cakes and pastries. She loves participating in baking competitions and dreams of opening her own bakery one day.</p>
            </div>
        </div>
    </section>
</main>

<?php include('includes/footer.php'); ?>

</body>
</html>
