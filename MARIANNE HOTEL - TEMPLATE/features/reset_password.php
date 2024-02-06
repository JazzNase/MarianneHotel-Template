<?php
session_start();

require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>

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
            <!-- Add your logo here -->
            <img src="/pictures/logoyata.svg"" alt=" Logo">
        </div>
        <form id="resetForm" action="reset_password.php" method="post" onsubmit="confirmReset(event);">
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Reset Password" class="btn">
            </div>
        </form>
    </div>
</body>

</html>