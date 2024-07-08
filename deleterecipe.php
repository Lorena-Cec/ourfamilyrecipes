<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in.";
    exit();
}

if (!isset($_POST['recipe_id'])) {
    echo "Recipe ID not provided.";
    exit();
}

include('dbconnection.php');

$recipe_id = $_POST['recipe_id'];

$sql_delete_saved = "DELETE FROM saved_recipes WHERE recipe_id = ?";
$stmt_delete_saved = $conn->prepare($sql_delete_saved);
$stmt_delete_saved->bind_param("i", $recipe_id);

if (!$stmt_delete_saved->execute()) {
    echo "Error deleting saved recipes.";
    exit();
}

$sql_delete_recipe = "DELETE FROM recipes WHERE id = ?";
$stmt_delete_recipe = $conn->prepare($sql_delete_recipe);
$stmt_delete_recipe->bind_param("i", $recipe_id);

if ($stmt_delete_recipe->execute()) {
    echo "success";
} else {
    echo "Error deleting recipe.";
}

$stmt_delete_saved->close();
$stmt_delete_recipe->close();
$conn->close();
?>
