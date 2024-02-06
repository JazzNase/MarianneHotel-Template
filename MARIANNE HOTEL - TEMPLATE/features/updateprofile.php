<?php

session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Update Profile</title>
    <!-- Add your styles or include external stylesheets here -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat';
        }

        body {
            background-image: url('/pictures/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        header {
            display: flex;
            align-items: center;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        header img {
            width: 60px;
            margin: 5px;
        }

        header .title {
            display: flex;
            align-items: center;
            background-color: white;
            z-index: 1;
        }

        header .title h1 {
            color: black;
            text-transform: uppercase;
            margin-left: 20px;
            font-size: 2rem;
        }

        header .navLinks ul {
            display: flex;
            justify-content: right;
            align-items: right;
            list-style: none;
            background-color: white;
            margin-top: -20px;
            height: 102px;
            box-shadow: none;
        }

        header .navLinks ul li {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 20px;
            background-color: white;
        }

        header .navLinks ul li a {
            color: black;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 400;
            background-color: white;
        }

        .container {
            width: 60%;
            float: left;
        }

        h2,
        h3 {
            color: black;
            font-size: 30px;
            text-align: center;
            font-weight: 800;
        }

        form {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: block;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: black;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
        }

        button {
            margin-top: 20px;
            width: 100%;
            font-family: "Montserrat";
        }

        .back {
            position: absolute;
            left: 0;
            bottom: 0;
            margin: 10px;
        }

        .log1 {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .centered-image {
            max-width: 80%;
            max-height: 80%;
            margin-left: 20%;
            margin-top: 50%;
            object-fit: contain;
        }

        .placeholder {
            width: 60%;
            margin-top: 7%;
            margin-left: auto;
            margin-right: auto;
            display: block;
            background-color: white;
            padding-bottom: 50px;
            padding-right: 90px;
            padding-left: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: white;
            overflow: hidden;
        }

        a {
            width: 100%;
            margin-top: 20px;
        }

        .mess {
            margin-top: 10px;
            color: green;
            font-weight: bolder;
        }
    </style>
</head>

<body>

    <div class="placeholder">

        <div class="container">

            <h2>Update Your Profile, !</h2>

            <form class="col s12" method="post" action="" onsubmit="return confirmReset(event)">
                <label for="new_lastname">New Last Name:</label>
                <input type="text" id="new_lastname" name="new_lastname" required>

                <label for="new_firstname">New First Name:</label>
                <input type="text" id="new_firstname" name="new_firstname" required>

                <label for="new_middlename">New Middle Name:</label>
                <input type="text" id="new_middlename" name="new_middlename">

                <label for="new_username">New Username:</label>
                <input type="text" id="new_username" name="new_username" required>

                <label for="new_emailaddress">New Email Address:</label>
                <input type="text" id="new_emailaddress" name="new_emailaddress" required>

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>

                <button class="brown btn" type="submit">Update Profile</button>
                <a class="brown btn" href="customerprofile.php">Back to Profile</a>
                <div class="mess"></div>
            </form>
        </div>
        <div class="log1">
            <img class="centered-image" src="/pictures/logoyata.svg" alt="Marianne Hotel">
        </div>
    </div>
    </div>


</body>

</html>