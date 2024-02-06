<?php
// Start the session and include the database configuration
session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Your Team</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">



    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        font-family: 'Roboto', sans-serif;
        margin-left: 15%;
        background-image: url('/pictures/bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: auto;
        /* Allow scrolling */
    }

    :root {
        --overlay-color: black;
        --overlay-opacity: 0.5;
    }

    body::before {
        content: "";
        position: fixed;
        /* Changed from absolute to fixed */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--overlay-color);
        /* Color of the overlay */
        opacity: var(--overlay-opacity);
        /* Adjust the opacity as needed */
    }


    .container {
        max-width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 1;
        position: relative;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    td button {
        padding: 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }



    td button.accept {
        background-color: #4CAF50;
        color: #fff;
    }

    td button.red {
        background-color: red;
        color: #fff;
    }

    td button:disabled {
        cursor: not-allowed;
        opacity: 0.5;
    }

    td a {
        padding: 8px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }

    /* CSS */
    .sidebar {
        width: 250px;
        height: 100vh;
        background: #333;
        color: #fff;
        position: fixed;
        left: 0;
        top: 0;
        transition: all 0.5s ease;
    }

    .sidebar.active {
        width: 60px;
    }

    .sidebar .logo-details {
        height: 60px;
        display: flex;
        align-items: center;
    }

    .sidebar .logo-details i {
        font-size: 28px;
        font-weight: 500;
    }



    .sidebar .logo {
        padding: 20px;
        background: #444;
        text-align: center;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        padding: 15px;
        border-bottom: 1px solid #444;
        transition: all 0.5s ease;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
    }

    .sidebar ul li:hover {
        background: #444;
    }

    .sidebar ul li .fa-solid {
        margin-right: 10px;
    }

    .menu-item {
        animation: slideIn 0.5s forwards;
        opacity: 0;
    }

    @keyframes slideIn {
        from {
            transform: translateX(-20px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .logo img {
        align-self: center;
        width: 60px;
    }

    ul {
        height: 88%;
        position: relative;
        list-style: none;
        padding: 0;
    }

    ul li {
        padding: 1.5rem;
        margin: 20px 0;
        border-radius: 8px;
        transition: all 0.5s ease-in-out;
    }

    ul li a {
        color: white;
        font-size: 14px;
        text-decoration: none;
        gap: 1.5rem;
        display: flex;
        color: black;
        align-items: center;
    }

    ul a span {
        overflow: hidden;
    }

    ul a i {
        font-size: 1.2rem;
        color: black;
    }

    ul li:hover {
        background: lightgray;
    }

    .logout-button {
        position: fixed;
        /* Fixed/sticky position */
        top: 20px;
        /* Place the button at the top */
        right: 20px;
        /* Place the button 20px from the right */
        z-index: 99;
        /* Make sure it does not overlap other items */
    }

    section {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mainContent {
        position: relative;
        width: 90%;
        margin-top: 10px;
        padding: 1rem;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .headerWrapper img {
        width: 50px;
        height: 50px;
        border-radius: 50px;
    }

    .headerWrapper {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        border-radius: 10%;
        padding: 10px 2rem;
    }

    .card {
        border: 1px solid #ddd;
        background-color: #f5f5f5;
        /* Change the color as per your requirement */
        border-radius: 10px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        margin: 1rem;
        animation-name: fadeIn;
        animation-duration: 1s;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .social-icons a {
        color: #000;
        transition: color 0.3s ease-in-out;
        margin-right: 10px;
        font-size: 1.2em;
    }

    .social-icons a:hover {
        color: #007bff;
    }

    .card:hover {
        transform: scale(1.05);
        /* Enlarge the card */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        /* Add a shadow */
    }


    /* CSS for larger screens */
    @media (min-width: 1000px) {
        .container {
            max-width: 1000px;
        }
    }

    /* CSS for medium screens */
    @media (min-width: 992px) and (max-width: 1199px) {
        .container {
            max-width: 960px;
        }
    }

    /* CSS for small screens */
    @media (min-width: 768px) and (max-width: 991px) {
        .container {
            max-width: 720px;
        }
    }

    /* CSS for extra small screens */
    @media (max-width: 767px) {
        .container {
            max-width: 540px;
        }
    }

    img[src="/pictures/logoyata.svg"] {
        filter: invert(1);
    }

    .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    .card .fa {
        color: #000;
        transition: color 0.3s ease-in-out;
        margin-right: 10px;
        font-size: 1.2em;
    }

    .card .fa:hover {
        color: #007bff;
    }

    .card .card-text a {
        color: #007bff;
        text-decoration: none;
    }

    .card .card-text a:hover {
        color: #0056b3;
    }

    .card-title {
        margin-top: 30px;
        /* Adjust as needed */
    }

    .social-icons a {
        margin: 0 10px;
        color: #333;
        /* Change the color as per your requirement */
    }

    .social-icons a:hover {
        color: #007bff;
        /* Change the color as per your requirement */
    }

    .social-icons i {
        font-size: 20px;
        /* Change the size as per your requirement */
    }

    .social-icons {
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="/pictures/logoyata.svg" alt="Logo">
            <h3>Your Hotel Name</h3>
        </div>
        <ul>
            <li>
                <a href="admintable.php" class="menu-item">

                    <span>Reservation</span>
                </a>
            </li>
            <li>
                <a href="room.php" class="menu-item">

                    <span>Room Availability</span>
                </a>
            </li>


            <li>
                <a href="summaryreport.php" class="menu-item">

                    <span>Summary and reports</span>
                </a>
            </li>

            <li>
                <a href="ourteam.php" class="menu-item">

                    <span>Your Team</span>
                </a>
            </li>
            <li class="logout">
                <a href="adminlogin.php" class="menu-item">

                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <h1 class="text-center">Your Team</h1>

        <h2>CEO</h2>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card mb-3 animated">
                        <div class="card-body">
                            <img src="/team/anonymous.png" class="card-img-top profile-pic d-block mx-auto">
                            <div class="card-body text-center">
                                <h5 class="card-title">Anonymous</h5>
                                <p class="card-text"></p>
                                <!-- Rest of the card content -->
                            </div>
                            <div class="social-icons">
                                <!-- Social media links removed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat the above structure for each team member, replacing the image source and card title as needed -->

    </div>

</body>

</html>