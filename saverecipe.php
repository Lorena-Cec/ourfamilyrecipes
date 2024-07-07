<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "error";
    exit();
}

if (!isset($_POST['recipe_id'])) {
    echo "error";
    exit();
}

$recipe_id = $_POST['recipe_id'];
$user_id = $_SESSION['user_id']; 

include('dbconnection.php');
$conn = connect_to_db();

$sql_check = "SELECT * FROM saved_recipes WHERE user_id = ? AND recipe_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $user_id, $recipe_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    echo "exists";
    $stmt_check->close();
    $conn->close();
    exit();
}

$stmt_check->close();

$sql = "INSERT INTO saved_recipes (user_id, recipe_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $recipe_id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
