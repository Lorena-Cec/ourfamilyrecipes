<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    echo "Access denied.";
    exit();
}

if (!isset($_POST['id'])) {
    echo "Recipe ID not provided.";
    exit();
}

include('dbconnection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$short_description = $_POST['short_description'];
$long_description = $_POST['long_description'];
$ingredients = $_POST['ingredients'];
$picture_url = $_POST['picture_url'];
$meal_type = $_POST['meal_type'];  

$sql = "UPDATE recipes SET name = ?, short_description = ?, long_description = ?, ingredients = ?, picture_url = ?, meal_type = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $name, $short_description, $long_description, $ingredients, $picture_url, $meal_type, $id);

if ($stmt->execute()) {
    echo "success";
    header("Location: recipeinfo.php?id=$id");
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
