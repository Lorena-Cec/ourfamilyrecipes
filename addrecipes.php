<?php
include('dbconnection.php');
session_start(); // Pokretanje sesije

// Provjera je li korisnik prijavljen i da li je admin
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username_admin = 'admin'; // Korisničko ime admina

if ($_SESSION['username'] !== $username_admin) {
    echo "Access denied";
    exit();
}

// Inicijalizacija varijabli za poruke o uspjehu i grešci
$message = '';
$error = '';

// Provjera da li je POST metoda poslana s podacima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prihvaćanje podataka iz forme
    $name = $_POST['name'];
    $shortDescription = $_POST['short_description'];
    $longDescription = $_POST['long_description'];
    $pictureUrl = $_POST['image_url']; 
    $mealType = $_POST['meal_type'];
    $ingredients = $_POST['ingredients'];

    // SQL upit za unos recepta u bazu podataka
    $sql = "INSERT INTO recipes (name, short_description, long_description, picture_url, meal_type, ingredients) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Priprema upita
    $stmt = $conn->prepare($sql);
    
    // Provjera pripreme upita
    if ($stmt === false) {
        $error = "Prepare failed (" . $conn->errno . ") " . $conn->error;
    } else {
        // Bindanje parametara
        $stmt->bind_param("ssssss", $name, $shortDescription, $longDescription, $pictureUrl, $mealType, $ingredients);

        // Izvršavanje upita
        if ($stmt->execute()) {
            $message = "New recipe added successfully";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Zatvaranje pripremljenog upita
        $stmt->close();
    }
}

// Zatvaranje veze s bazom podataka
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Recipe</title>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <h2 class="h2">Add a New Recipe</h2>
    <div class="recipe-container">
        
        
        <!-- Display success or error message -->
        <?php if ($message): ?>
            <div class="success-message"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form class="form-container" method="POST" action="addrecipes.php">
            <label for="name">Recipe Name</label>
            <input type="text" id="name" name="name" required><br>

            <label for="short_description">Short Description</label>
            <input type="text" id="short_description" name="short_description" required><br>

            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description" rows="5" required></textarea><br>

            <label for="image_url">Image URL</label>
            <input type="url" id="image_url" name="image_url" required><br>

            <label for="meal_type">Meal Type</label>
            <select id="meal_type" name="meal_type" required>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Dessert">Dessert</option>
            </select><br>

            <label for="ingredients">Ingredients</label>
            <textarea id="ingredients" name="ingredients" rows="5" required></textarea><br>
            <div class="button">
                <button type="submit" class="regular-button">Add Recipe</button>
            </div>
        </form>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
