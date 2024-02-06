<?php
// login.php - User login

session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');


$errors = []; // Array to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Using prepared statements to prevent SQL injection
    $sql = "SELECT user_id, password FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row["password"]) {
            $_SESSION["user_id"] = $row["user_id"];
            header("Location: customerprofile.php");
            exit();
        } else {
            $errors[] = "Invalid password. Please try again.";
        }
    } else {
        $errors[] = "User not found. Please check your username.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<!-- Rest of your HTML code remains unchanged -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <title>Login Page</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url('/pictures/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
            overflow: hidden;
            /* Prevent scrolling */
        }

        .placeholder {
            width: 50%;
            height: 70%;
            margin: 6% auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .row {
            width: 60%;
        }

        .logo {
            width: 32%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .centered-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .login-container h2 {
            color: #333;
        }

        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-group a {
            text-decoration: none;
            color: #333;
            margin-top: 10px;
            display: block;
        }

        .error-message {
            color: #ff0000;
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer {
            width: 80%;
            margin: 20px auto;
            text-align: center;
            color: black;
        }

        footer hr {
            border: 1px solid #ccc;
        }

        .btn {
            background-color: #86654B;
            width: 100%;
            margin-bottom: 20px;
        }

        .btn a {
            text-decoration: none;
            color: white;
        }

        .forgot {
            width: 20%;
            font-size: 0.8rem;
        }

        .forgot:hover {
            color: blue;
        }
    </style>
</head>

<body>



    <div class="placeholder">
        <div class="row">
            <div class="login-container">
                <h2><b>LOGIN</b></h2>
                <h5>Welcome to Marianne Hotel</h5>
                <!-- Display error messages if there are any -->
                <?php
                foreach ($errors as $error) {
                    echo "<p class='error-message'>$error</p>";
                }
                ?>
                <form action="login.php" method="post" class="login-form">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input style="width:92%; padding:0 20px;" class="inp" type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input style="width:92%; padding:0 20px;" type="password" id="password" name="password" required>
                        <a class="forgot" href="forgot_password.php">Forgot Password?</a> <!-- Add this line -->
                    </div>
                    <button class="btn" type="submit">Login</button>
                </form>
                <button class="btn"> <a href="register.php">Register</a></button>
                <button class="btn"> <a href="/homepages/Home.php">Back to Home</a></button>

            </div>
        </div>

        <div class="logo">
            <a href="/homepages/home.php"><img class="centered-image" src="/pictures/logoyata.svg" alt="Marianne Hotel"></a>

        </div>
    </div>


</body>

</html>