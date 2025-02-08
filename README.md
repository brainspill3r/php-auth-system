# PHP Auth System

A simple user authentication system built in PHP that demonstrates user registration, login, and logout functionality. This project uses PDO for secure database interactions, PHP sessions for state management, and password hashing for security.

## Features

- **User Registration:** Create a new account with a unique email address.
- **User Login:** Secure login using hashed passwords.
- **Session Management:** Protect pages by verifying user sessions.
- **Logout:** End the session and securely log out the user.
- **MySQL Integration:** Uses a MySQL database to store user data with prepared statements to prevent SQL injection.

## Prerequisites

- PHP 7.4 or later
- MySQL 5.7 or later
- A web server (e.g., Apache or Nginx)

## Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/YOUR_USERNAME/php-auth-system.git
   cd php-auth-system
