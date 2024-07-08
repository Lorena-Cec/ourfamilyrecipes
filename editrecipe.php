<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "Access denied.";
    exit();
}

if (!isset($_GET['id'])) {
    echo "Recipe ID not provided.";
    exit();
}

include('dbconnection.php');

$id = $_GET['id'];

$sql = "SELECT * FROM recipes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $long_description = $row['long_description'];
    $short_description = $row['short_description'];
    $picture_url = $row['picture_url'];
    $meal_type = $row['meal_type'];  
    $ingredients = $row['ingredients'];
} else {
    echo "Recipe not found.";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <h2 class="h2">Edit Recipe</h2>
    <div class="edit-recipe-container">
        
        <form action="updaterecipe.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            
            <label for="short_description">Short Description:</label>
            <textarea id="short_description" name="short_description" required><?php echo htmlspecialchars($short_description); ?></textarea>
            
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description" required><?php echo htmlspecialchars($long_description); ?></textarea>
            
            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" required><?php echo htmlspecialchars($ingredients); ?></textarea>
            
            <label for="picture_url">Picture URL:</label>
            <input type="text" id="picture_url" name="picture_url" value="<?php echo htmlspecialchars($picture_url); ?>" required>
            
            <label for="meal_type">Meal Type</label>
            <select id="meal_type" name="meal_type" required>
                <option value="Breakfast" <?php if($meal_type == 'Breakfast') echo 'selected'; ?>>Breakfast</option>
                <option value="Lunch" <?php if($meal_type == 'Lunch') echo 'selected'; ?>>Lunch</option>
                <option value="Dinner" <?php if($meal_type == 'Dinner') echo 'selected'; ?>>Dinner</option>
                <option value="Dessert" <?php if($meal_type == 'Dessert') echo 'selected'; ?>>Dessert</option>
            </select><br>
            <div class="button">
                <button type="submit" class="regular-button">Update Recipe</button>
            </div>
            
        </form>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
