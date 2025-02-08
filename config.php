<?php
session_start();

// Load environment variables using phpdotenv
require_once __DIR__ . '/vendor/autoload.php';

use Libsql\Database;

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get Turso database URL from the .env file
$database_url = $_ENV['TURSO_DATABASE_URL'] ?? '';

try {
    // Create a new Database instance
    $db = new Database(
        url: $databaseUrl,
        authToken: $authToken
    );

    // Test the connection (Optional: Run a simple query)
    $result = $db->execute("SELECT 1;");
    echo "Connected to Turso database successfully!";
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
