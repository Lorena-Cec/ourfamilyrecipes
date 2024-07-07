<?php
include('dbconnection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Provjera korisnika s unesenim korisničkim imenom
    $check_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows == 1) {
        $user = $check_result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Korisnik je uspješno prijavljen, postavi sesijske varijable
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            $error_message = "Pogrešna lozinka. Molimo pokušajte ponovo.";
        }
    } else {
        $error_message = "Korisničko ime ne postoji.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <h2 class="h2">Login</h2>
    <div class="login-container">
        
        <?php if (isset($error_message)) { echo "<p class='error'>$error_message</p>"; } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <div class="button">
                <button type="submit" class="regular-button">Login</button>
            </div>
            
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
