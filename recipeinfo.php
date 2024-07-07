<?php
include('dbconnection.php');

session_start();

if (!isset($_GET['id'])) {
    echo "Recipe ID not provided.";
    exit();
}

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
    $ingredients = $row['ingredients'];
} else {
    echo "Recipe not found.";
    exit();
}

if (!isset($_SESSION['user_id'])) {
    $saved = false; 
} else {
    $user_id = $_SESSION['user_id'];
    $sql_check_saved = "SELECT * FROM saved_recipes WHERE user_id = ? AND recipe_id = ?";
    $stmt_check_saved = $conn->prepare($sql_check_saved);
    $stmt_check_saved->bind_param("ii", $user_id, $id);
    $stmt_check_saved->execute();
    $result_check_saved = $stmt_check_saved->get_result();
    $saved = ($result_check_saved->num_rows > 0);
    $stmt_check_saved->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <link rel="stylesheet" href="stylerecipeinfo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="title">
        <h2 class="large-text"><?php echo $name; ?></h2>
        <h2 class="text"><?php echo $short_description; ?></h2>
    </div>
    <div class="recipe-container">
        <div class="recipe-details">
            
            <div class="recipe-image">
                <img src="<?php echo $picture_url; ?>" alt="<?php echo $name; ?>">
            </div>

            <div class="ingredients">
                <h2 class="text">Ingredients:</h2>
                <ul class="medium-text">
                    <?php
                    $ingredients_array = explode("\n", $ingredients);
                    foreach ($ingredients_array as $ingredient) {
                        echo "<li>" . htmlspecialchars($ingredient) . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="description">
                <h2 class="text">Description:</h2>
                <ul class="medium-text">
                    <?php
                    $long_description_array = explode("\n", $long_description);
                    foreach ($long_description_array as $long_description) {
                        echo "<li>" . htmlspecialchars($long_description) . "</li>";
                    }
                    ?>
                </ul>
            </div>
    </div>
    <div class="save">
        <?php if (!$saved): ?>
        <form id="save-recipe-form">
            <input type="hidden" name="recipe_id" value="<?php echo $id; ?>">
            <button type="submit" class="button">Save Recipe</button>
        </form>
    <?php else: ?>
        <p>Recipe already saved.</p>
    <?php endif; ?>
    </div>                
    
    <?php include('includes/footer.php'); ?>
    
    <script>
    $(document).ready(function() {
        $('#save-recipe-form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: 'saverecipe.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response === 'success') {
                        alert('Recipe saved successfully.');
                        location.reload();
                    } else if (response === 'exists') {
                        alert('Recipe already saved.');
                    } else {
                        alert('Error saving recipe.');
                    }
                }
            });
        });
    });
    </script>
</body>
</html>