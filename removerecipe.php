<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in.";
    exit();
}

if (!isset($_POST['saved_recipe_id'])) {
    echo "Saved Recipe ID not provided.";
    exit();
}

include('dbconnection.php');

$user_id = $_SESSION['user_id'];
$saved_recipe_id = $_POST['saved_recipe_id'];

$sql = "DELETE FROM saved_recipes WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $saved_recipe_id, $user_id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
