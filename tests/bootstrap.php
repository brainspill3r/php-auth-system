<?php

define('PHPUNIT_RUNNING', true);
require_once __DIR__ . '/../config.php';

// Ensure $pdo is set
global $pdo;
if (!isset($pdo) || $pdo === null) {
    die("Error: Database connection failed in bootstrap.");
}

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Suppress output to prevent "headers already sent" errors
ob_start();

// Create test tables (ensuring a fresh database)
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
)");
?>

