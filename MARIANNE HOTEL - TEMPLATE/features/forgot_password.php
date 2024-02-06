<?php
session_start(); // Start the session at the beginning of your script

// Rest of your code...
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');
require 'vendor/autoload.php'; // Assuming you installed PHPMailer using composer

?>
<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('/pictures/bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            width: 90%;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 50%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 18px;
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="/pictures/logoyata.svg" alt="Marianne Hotel">
        </div>
        <form action="forgot_password.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn">Send Verification Code</button>
        </form>
        <div class="links">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            <a href="/homepages/home.php">Home</a>
        </div>
    </div>


</body>

</html>