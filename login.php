<?php
require_once 'config.php';

// Prevent execution during PHPUnit tests
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? null;
if ($requestMethod !== 'POST') {
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and trim input values
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Basic validation
    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        if (handleLogin($pdo, $email, $password)) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>