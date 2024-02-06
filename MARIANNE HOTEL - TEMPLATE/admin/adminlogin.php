<?php
session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $select_admin_query = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $select_admin_query->bind_param("s", $username);
    $select_admin_query->execute();
    $result = $select_admin_query->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && $password === $admin["password"]) {
        // Admin login successful, redirect to admintable.php
        header("Location: admintable.php");
        exit();
    } else {
    }

    $select_admin_query->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Admin Login</title>

    <style>
        body {
            font-family: 'Montserrat';
            background-image: url('/pictures/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            /* Prevent scrolling */
        }

        h2 {
            text-align: center;
            font-weight: 700;
        }

        form {
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            display: block;
            text-align: center;
        }

        .placeholder {
            width: 50%;
            margin-top: 8%;
            margin-left: auto;
            margin-right: auto;
            display: block;
            background-color: white;
            padding: 90px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: white;
            overflow: hidden;
        }

        button {
            margin-top: 20px;
            width: 100%;
            font-family: "Montserrat";
        }

        .row {
            width: 60%;
            float: left;
        }

        .logo {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .centered-image {
            max-width: 80%;
            max-height: 80%;
            margin-left: 20%;
            margin-top: 30%;
            object-fit: contain;
        }

        input {
            font-family: "Montserrat";
        }

        a {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="placeholder">

        <div class="row">
            <h2>Admin Login</h2>
            <form class="col s12" action="adminlogin.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <button class="brown btn" type="submit"><i class="material-icons right">login</i>Login</button>
                <a class="brown btn" href="/homepages/home.php"><i class="material-icons right">arrow_back</i>Back to Home</a>
            </form>
        </div>
        <div class="logo">
            <img class="centered-image" src="/pictures/logoyata.svg" alt="Marianne Hotel">
        </div>
    </div>


</body>

</html>