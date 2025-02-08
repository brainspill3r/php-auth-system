# PHP Auth System

A simple user authentication system built in PHP that demonstrates user registration, login, and logout functionality. This project uses PDO for secure database interactions, PHP sessions for state management, and password hashing for security.

## Features

- **User Registration:** Create a new account with a unique email address.
- **User Login:** Secure login using hashed passwords.
- **Session Management:** Protect pages by verifying user sessions.
- **Logout:** End the session and securely log out the user.

![image](https://github.com/user-attachments/assets/b67a0c8d-c5f8-42eb-9529-1ac83bfcfdf8)
![image](https://github.com/user-attachments/assets/4ab7e478-9ad5-45e4-b1f1-95074abd27a2)
![image](https://github.com/user-attachments/assets/0cdcb5fd-0b11-4e83-8c4c-4cc4108bd3ff)
![image](https://github.com/user-attachments/assets/a832ae4b-5234-4822-a830-71d5d2990b4c)

## 📌 Prerequisites
Ensure you have the following installed:
- PHP 8.3+
- SQLite3
- Composer (optional for dependencies)

## 🚀 Setup Instructions

### 1️⃣ Install SQLite3 (if not installed)

#### **Ubuntu/Debian**
```sh
sudo apt update
sudo apt install sqlite3 php8.3-sqlite3
```

#### **Mac (Homebrew)**
```sh
brew install sqlite
```

#### **Windows**
1. Download SQLite from [sqlite.org](https://www.sqlite.org/download.html)
2. Extract and add it to your system `PATH`

### 2️⃣ Create the SQLite Database
Run the following commands:
```sh
touch database.db
chmod 777 database.db
```

### 3️⃣ Create Users Table
Open the SQLite shell:
```sh
sqlite3 database.db
```
Inside the SQLite shell, run:
```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
);
.exit
```

### 4️⃣ Verify the Database Exists
```sh
ls -l database.db
```

### 5️⃣ Run PHP Server
```sh
php -S 0.0.0.0:8000
```

## 🔧 Configuration (config.php)
Ensure your `config.php` correctly points to the SQLite database:
```php
<?php
session_start();

// Define SQLite database path
$databaseFile = __DIR__ . '/database.db';

try {
    // Create a new PDO connection for SQLite
    $pdo = new PDO("sqlite:" . $databaseFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
```

## 🏁 Testing the Connection
Run:
```sh
php config.php
```
If no errors appear, the database connection is working!

## ✅ Next Steps
- Implement authentication (register & login)
- Secure passwords using `password_hash()`
- Add session handling
- Improve error handling


