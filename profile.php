<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('dbconnection.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT username FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

$sql_recipes = "SELECT sr.id AS saved_recipe_id, r.id, r.name, r.short_description, r.picture_url 
               FROM saved_recipes sr
               JOIN recipes r ON sr.recipe_id = r.id
               WHERE sr.user_id = ?";
$stmt_recipes = $conn->prepare($sql_recipes);
$stmt_recipes->bind_param("i", $user_id);
$stmt_recipes->execute();
$result_recipes = $stmt_recipes->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="stylerecipes.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <h3 class="text">Your Saved Recipes:</h3>

        <?php if ($result_recipes->num_rows > 0): ?>
            <div class="recipes-container">
                <?php while ($row_recipe = $result_recipes->fetch_assoc()): ?>
                    <div class="recipe" id="recipe-<?php echo $row_recipe['saved_recipe_id']; ?>">
                        <a href="recipeinfo.php?id=<?php echo $row_recipe['id']; ?>" class="link">
                            <img src="<?php echo $row_recipe['picture_url']; ?>" alt="<?php echo $row_recipe['name']; ?>">
                        </a>
                        <h2><?php echo $row_recipe['name']; ?></h2>
                        <p><?php echo $row_recipe['short_description']; ?></p>
                        <button class="regular-button" onclick="removeRecipe(<?php echo $row_recipe['saved_recipe_id']; ?>)">Remove Recipe</button>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="found">No saved recipes found.</p>
        <?php endif; ?>
    </div>

    <?php include('includes/footer.php'); ?>
    
    <script>
    function removeRecipe(savedRecipeId) {
        if (confirm("Are you sure you want to remove this recipe?")) {
            $.ajax({
                url: 'removerecipe.php',
                type: 'POST',
                data: { saved_recipe_id: savedRecipeId },
                success: function(response) {
                    if (response === 'success') {
                        $('#recipe-' + savedRecipeId).remove();
                        alert("Recipe removed.");
                    } else {
                        alert("Error removing recipe.");
                    }
                }
            });
        }
    }
    </script>
</body>
</html>

<?php
$stmt_recipes->close();
$conn->close();
?>
