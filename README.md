# Login and Registration System

This project is a login and registration system built using PHP and MySQL. 

## Features

- User registration.
- User login.
- Success and error messages for registration and login.
- Session management to store user data after login.
- A home page that displays the user's name and Picture after login.
- Logout functionality.

  ## Technologies Used

- **PHP**: For data processing and database connection.
- **MySQL**: For storing user data.
- **Bootstrap**: For front-end styling.
- **JavaScript**: For form interactivity.
  

## Screenshots

### Signup Page
![Signup Page](screenshots/signUp.jpg)

### Login Page
![Login Page](screenshots/signIn.jpg)

### Home Page After Login
![Home Page](screenshots/home.jpg)

## Requirements

- A web server with PHP support (e.g., XAMPP, WAMP, or MAMP).
- MySQL database.

## Installation

1. Download or clone the project into a folder inside your local web server (e.g., `htdocs` if using XAMPP).
2. Import the database:
   - Open the `login.sql` file and execute it in phpMyAdmin or any database management tool to create the required table.
3. Modify the `connect.php` file to add your database connection details:
   ```php
   $host = 'localhost'; // Server name
   $user = 'username'; // Database username
   $password = 'password'; // Database password
   $db = 'login'; // Database name
