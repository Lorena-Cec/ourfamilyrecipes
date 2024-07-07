<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
require_once('dbconnection.php');

$conn = connect_to_db();

$mealType = isset($_GET['meal_type']) ? $_GET['meal_type'] : '';

$sql = "SELECT id, name, short_description, picture_url FROM recipes";
if (!empty($mealType)) {
    $sql .= " WHERE meal_type = ?";
}

$stmt = $conn->prepare($sql);

if (!empty($mealType)) {
    $stmt->bind_param("s", $mealType);
}

$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylerecipes.css">
    <title>Recipes</title>
</head>
<body>

<?php include('includes/header.php'); ?>

<main>
    <h1>Recipes for every time of day.</h1>

    <form method="GET" action="recipes.php" id="sortForm">
        <label for="meal_type">Sort by meal:</label>
        <select name="meal_type" id="meal_type" onchange="document.getElementById('sortForm').submit();">
            <option value="">All</option>
            <option value="Breakfast" <?php if($mealType == 'Breakfast') echo 'selected'; ?>>Breakfast</option>
            <option value="Lunch" <?php if($mealType == 'Lunch') echo 'selected'; ?>>Lunch</option>
            <option value="Dinner" <?php if($mealType == 'Dinner') echo 'selected'; ?>>Dinner</option>
            <option value="Dessert" <?php if($mealType == 'Dessert') echo 'selected'; ?>>Desserts</option>
        </select>
    </form>
    
    <div class="recipes-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="recipe">
                    <a href="recipeinfo.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['picture_url']; ?>" alt="<?php echo $row['name']; ?>">
                    </a>
                    <h2><?php echo $row['name']; ?></h2>
                    <p><?php echo $row['short_description']; ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No recipes found.</p>
        <?php endif; ?>
    </div>
</main>

<?php include('includes/footer.php'); ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
