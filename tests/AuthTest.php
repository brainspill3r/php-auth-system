<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../config.php'; // Now contains handleLogin()

class AuthTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        global $pdo;
        $this->pdo = new PDO("sqlite::memory:");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Create test table
        $this->pdo->exec("CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL
        )");

        // Assign test DB to global PDO variable
        $pdo = $this->pdo;

        // Start session for testing login/logout
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function testUserRegistration(): void
    {
        // Arrange
        $username = "testuser";
        $email = "test@example.com";
        $password = "password123";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Act
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $result = $stmt->execute([$username, $email, $hashedPassword]);

        // Assert
        $this->assertTrue($result, "User should be registered successfully.");

        // Verify the user exists
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        $this->assertNotFalse($user, "User should exist in the database.");
    }

    public function testValidLogin(): void
    {
        // Arrange
        $email = "test@example.com";
        $password = "password123";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute(["testuser", $email, $hashedPassword]);
    
        // Act: Call the function instead of requiring the file
        $result = handleLogin($this->pdo, $email, $password);
    
        // Assert: Login should be successful
        $this->assertTrue($result, "Login should succeed with valid credentials.");
        $this->assertArrayHasKey('user_id', $_SESSION, "User ID should be set in session after login.");
    }

    public function testInvalidLogin(): void
    {
        // Arrange
        $_POST['email'] = "wrong@example.com";
        $_POST['password'] = "wrongpassword";

        // Act: Call the function instead of requiring the file
        $result = handleLogin($this->pdo, $_POST['email'], $_POST['password']);

        // Assert: Login should fail
        $this->assertFalse($result, "Login should fail for invalid credentials.");
    }

    public function testLogout(): void
    {
        // Arrange: Simulate logged-in user
        $_SESSION['user_id'] = 1;

        // Act: Call logout script
        require __DIR__ . '/../logout.php';

        // Assert: Session should be cleared
        $this->assertArrayNotHasKey('user_id', $_SESSION, "User should be logged out.");
    }
}
