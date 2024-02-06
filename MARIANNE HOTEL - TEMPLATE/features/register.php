<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">


    <title>Registration Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-image: url('/pictures/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            align-items: center;
            width: 80%;
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
            width: 100%;
            background-color: white;
            padding: 28px;
            margin: 0 auto;
            border-radius: 10px;
            backdrop-filter: blur(2px);
        }

        .formTitle {
            font-size: 40px;
            text-align: center;
            color: black;
            font-weight: 900;
        }

        .mainuserInfo {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 10px 0;
        }

        .userinputBox {
            width: 48%;
            margin-bottom: 20px;
        }

        .userinputBox label {
            display: block;
            color: black;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .userinputBox input {
            height: 40px;
            width: 100%;
            border-radius: 7px;
            outline: none;
            border: 1px solid #ccc;
            padding: 0 10px;
        }

        .userinputBox button {
            background-color: #86654B;
        }

        .formsubmitBtn {
            text-align: center;
        }

        .formsubmitBtn button {
            width: 100%;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #86654B;
            outline: none;
            cursor: pointer;
        }

        .formsubmitBtn a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: black;
        }

        .log1 {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            float: right;
        }

        .centered-image {
            max-width: 80%;
            max-height: 80%;
            margin-left: 20%;
            object-fit: contain;
        }

        .placeholder {
            width: 55%;
            display: flex;
            margin: 1% auto;
            justify-content: space-between;
            background-color: white;
            padding: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
        }

        footer {
            position: fixed;
            bottom: 3%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            text-align: center;
            color: black;
            font-family: 'Montserrat', sans-serif;
        }

        footer hr {
            border: 1px solid #ccc;
        }

        /* Add this style to your existing CSS or in the head section of your HTML */
        .code-sent-message {
            opacity: 0;
            color: green;
            font-size: 16px;
            margin-top: 10px;
            transition: opacity 1s ease;
        }
    </style>


</head>

<body>

    <div class="placeholder">
        <div class="container">
            <h2 class="formTitle">REGISTER</h2>
            <form action="register.php" method="post" class="register-form" onsubmit="return validatePassword()">
                <div class="mainuserInfo">
                    <!-- Example for the first name input -->
                    <div class="userinputBox">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" oninput="validateNameInput(this)" required>
                    </div>

                    <!-- Example for the first name input -->
                    <div class="userinputBox">
                        <label for="middlename">Middle Name:</label>
                        <input type="text" id="middlename" name="middlename" oninput="validateNameInput(this)" required>
                    </div>

                    <!-- Example for the first name input -->
                    <div class="userinputBox">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" oninput="validateNameInput(this)" required>
                    </div>

                    <div class="userinputBox">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="userinputBox" onclick="togglePasswordVisibility('password', 'password-icon')">
                        <label for="password">Password:</label>
                        <div class="password-input">
                            <input type="password" id="password" name="password" required>
                            <span class="material-icons" id="password-icon">visibility_off</span>
                        </div>
                    </div>
                    <div class="userinputBox" onclick="togglePasswordVisibility('confirmPassword', 'confirmPassword-icon')">
                        <label for="confirmPassword">Confirm Password:</label>
                        <div class="password-input">
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                            <span class="material-icons" id="confirmPassword-icon">visibility_off</span>
                        </div>
                    </div>
                    <div class="userinputBox">
                        <label for="emailaddress">Email Address:</label>
                        <input type="email" id="emailaddress" name="emailaddress" required>
                    </div>

                    <!-- Add this inside the form where you want the verification code input -->
                    <div class="userinputBox">
                        <label for="verificationCode">Verification Code:</label>
                        <input type="text" id="verificationCode" name="verificationCode" required>
                    </div>

                    <div class="userinputBox">
                        <button type="button" onclick="sendVerificationCode()" class="btn">Send Code</button>
                    </div>
                    <div id="code-sent-message" class="code-sent-message">Verification code sent!</div>




                </div>
                <div class="formsubmitBtn">
                    <button class="btn" type="submit">Register</button>
                    <a href="login.php">Back to Login</a>
                </div>
            </form>
        </div>
        <div class="log1">
            <img class="centered-image" src="/pictures/logoyata.svg" alt="Marianne Hotel">
        </div>
    </div>







</body>

</html>

</body>

</html>