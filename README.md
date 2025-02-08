# PHP Auth System

A simple user authentication system built in PHP that demonstrates user registration, login, and logout functionality. This project uses PDO for secure database interactions, PHP sessions for state management, and password hashing for security.

## Features

- **User Registration:** Create a new account with a unique email address.
- **User Login:** Secure login using hashed passwords.
- **Session Management:** Protect pages by verifying user sessions.
- **Logout:** End the session and securely log out the user.
- **Turso Integration:** Uses a sqlite database to store user data with prepared statements to prevent SQL injection.

![image](https://github.com/user-attachments/assets/aa685c13-417f-4ae6-a91b-e6989dd397da)

![image](https://github.com/user-attachments/assets/0a5d2742-3e83-4284-bbd7-370837e6a92f)


## Prerequisites

- PHP 8.3 or later
- Turso v0.2.4database - Using the Turso CLI & token (sqlite)
- A web server (e.g., Apache or Nginx)

![image](https://github.com/user-attachments/assets/82012e42-27ef-494f-b726-89c77fccdff6)

![image](https://github.com/user-attachments/assets/82608c1a-7004-42e2-83d5-8590594c5a76)

![image](https://github.com/user-attachments/assets/6cd8a6c3-82c8-4675-be3b-41c12c9355f3)


## Installation

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/YOUR_USERNAME/php-auth-system.git
   cd php-auth-system


2. Connect to Turso database and authenticate
    - Install Turso -  curl -sSfL https://get.tur.so/install.sh | bash
    - Path by default is - /root/.turso/turso 
        Use this command - export PATH="/root/.turso:$PATH"
    - turso auth login --headless 
    - turso config set token "JWT TOKEN HERE"
    - turso db create authsystem
    - turso db shell authsystem

3. Run Server 
    - php -S localhost:8000
    - visit - http://localhost:8000 in browser 
    
