<?php
// Start the session and include the database configuration
session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

// Calculate and retrieve summary data for accepted reservations only
$profits_query = $conn->query("SELECT SUM(reservation_cost) AS total_profits FROM reservations WHERE status = 'Accepted'");
$totalProfits = $profits_query->fetch_assoc()['total_profits'];

$accepted_count_query = $conn->query("SELECT COUNT(*) AS accepted_count FROM reservations WHERE status = 'Accepted'");
$acceptedCount = $accepted_count_query->fetch_assoc()['accepted_count'];

$rejected_count_query = $conn->query("SELECT COUNT(*) AS rejected_count FROM reservations WHERE status = 'Rejected'");
$rejectedCount = $rejected_count_query->fetch_assoc()['rejected_count'];

$pending_count_query = $conn->query("SELECT COUNT(*) AS pending_count FROM reservations WHERE status = 'Pending'");
$pendingCount = $pending_count_query->fetch_assoc()['pending_count'];

// Calculate and retrieve daily profits
$daily_profits_query = $conn->query("SELECT SUM(reservation_cost) AS daily_profits FROM reservations WHERE status = 'Accepted' AND DATE(CONCAT(reservation_date, ' ', reservation_time)) = CURDATE()");
$dailyProfits = $daily_profits_query->fetch_assoc()['daily_profits'];

// Calculate and retrieve weekly profits
$weekly_profits_query = $conn->query("SELECT SUM(reservation_cost) AS weekly_profits FROM reservations WHERE status = 'Accepted' AND YEARWEEK(CONCAT(reservation_date, ' ', reservation_time)) = YEARWEEK(CURDATE())");
$weeklyProfits = $weekly_profits_query->fetch_assoc()['weekly_profits'];

// Calculate and retrieve monthly profits
$monthly_profits_query = $conn->query("SELECT SUM(reservation_cost) AS monthly_profits FROM reservations WHERE status = 'Accepted' AND MONTH(CONCAT(reservation_date, ' ', reservation_time)) = MONTH(CURDATE()) AND YEAR(CONCAT(reservation_date, ' ', reservation_time)) = YEAR(CURDATE())");
$monthlyProfits = $monthly_profits_query->fetch_assoc()['monthly_profits'];

// Calculate and retrieve yearly profits
$yearly_profits_query = $conn->query("SELECT SUM(reservation_cost) AS yearly_profits FROM reservations WHERE status = 'Accepted' AND YEAR(CONCAT(reservation_date, ' ', reservation_time)) = YEAR(CURDATE())");
$yearlyProfits = $yearly_profits_query->fetch_assoc()['yearly_profits'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Summary Report</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">



    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    body {
        font-family: 'Montserrat';
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

    /* CSS for larger screens */
    @media (min-width: 1200px) {
        .container {
            max-width: 1200px;
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
</style>

<body>

    <div class="sidebar">
        <div class="logo">
            <img src="/pictures/logoyata.svg" alt="Logo">
            <h3>Marianne Hotel</h3>
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

                    <span>Our Team</span>
                </a>
            </li>
            <li class="logout">
                <a href="adminlogin.php" class="menu-item">

                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <style>
        .custom-container {
            max-width: 80%;
            /* Adjust this value to your liking */
            margin: auto;
        }
    </style>
    <div class="container mt-5 custom-container">
        <div id="printableArea">



            <!-- Include Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">



            <?php
            // Calculate and retrieve counts for each room category
            $economy_query = $conn->query("SELECT COUNT(*) AS economy_count FROM reservations WHERE room_category = 'Economy' AND status = 'Accepted'");
            $economyCount = $economy_query->fetch_assoc()['economy_count'];

            $deluxe_query = $conn->query("SELECT COUNT(*) AS deluxe_count FROM reservations WHERE room_category = 'Deluxe' AND status = 'Accepted'");
            $deluxeCount = $deluxe_query->fetch_assoc()['deluxe_count'];

            $premium_query = $conn->query("SELECT COUNT(*) AS premium_count FROM reservations WHERE room_category = 'Premium' AND status = 'Accepted'");
            $premiumCount = $premium_query->fetch_assoc()['premium_count'];

            // Calculate and retrieve daily profits
            $daily_profits_query = $conn->query("SELECT SUM(reservation_cost) AS daily_profits FROM reservations WHERE status = 'Accepted' AND DATE(CONCAT(reservation_date, ' ', reservation_time)) = CURDATE()");
            $dailyProfits = $daily_profits_query->fetch_assoc()['daily_profits'];

            // Calculate and retrieve weekly profits
            $weekly_profits_query = $conn->query("SELECT SUM(reservation_cost) AS weekly_profits FROM reservations WHERE status = 'Accepted' AND YEARWEEK(CONCAT(reservation_date, ' ', reservation_time)) = YEARWEEK(CURDATE())");
            $weeklyProfits = $weekly_profits_query->fetch_assoc()['weekly_profits'];

            // Calculate and retrieve monthly profits
            $monthly_profits_query = $conn->query("SELECT SUM(reservation_cost) AS monthly_profits FROM reservations WHERE status = 'Accepted' AND MONTH(CONCAT(reservation_date, ' ', reservation_time)) = MONTH(CURDATE()) AND YEAR(CONCAT(reservation_date, ' ', reservation_time)) = YEAR(CURDATE())");
            $monthlyProfits = $monthly_profits_query->fetch_assoc()['monthly_profits'];

            // Calculate and retrieve yearly profits
            $yearly_profits_query = $conn->query("SELECT SUM(reservation_cost) AS yearly_profits FROM reservations WHERE status = 'Accepted' AND YEAR(CONCAT(reservation_date, ' ', reservation_time)) = YEAR(CURDATE())");
            $yearlyProfits = $yearly_profits_query->fetch_assoc()['yearly_profits'];

            // HTML to display the profit summaries
            // Calculate and retrieve total profits
            $total_profits_query = $conn->query("SELECT SUM(reservation_cost) AS total_profits FROM reservations WHERE status = 'Accepted'");
            $totalProfit = $total_profits_query->fetch_assoc()['total_profits'];

            $total_query = $conn->query("SELECT COUNT(*) AS total_count FROM reservations");
            $totalCount = $total_query->fetch_assoc()['total_count'];

            // Calculate and retrieve counts for each payment status
            $full_payment_query = $conn->query("SELECT COUNT(*) AS full_payment_count FROM reservations WHERE remaining_payment = 0");
            $fullPaymentCount = $full_payment_query->fetch_assoc()['full_payment_count'];

            $not_full_payment_query = $conn->query("SELECT COUNT(*) AS not_full_payment_count FROM reservations WHERE remaining_payment != 0");
            $notFullPaymentCount = $not_full_payment_query->fetch_assoc()['not_full_payment_count'];

            // Calculate and retrieve counts for each payment method
            $gcash_query = $conn->query("SELECT COUNT(*) AS gcash_count FROM reservations WHERE payment_method = 'Gcash'");
            $gcashCount = $gcash_query->fetch_assoc()['gcash_count'];

            $paymaya_query = $conn->query("SELECT COUNT(*) AS paymaya_count FROM reservations WHERE payment_method = 'Paymaya'");
            $paymayaCount = $paymaya_query->fetch_assoc()['paymaya_count'];

            $visa_query = $conn->query("SELECT COUNT(*) AS visa_count FROM reservations WHERE payment_method = 'Visa'");
            $visaCount = $visa_query->fetch_assoc()['visa_count'];

            // Calculate and retrieve counts for each reservation hour
            $one_hour_query = $conn->query("SELECT COUNT(*) AS one_hour_count FROM reservations WHERE hours_reserved = 1");
            $oneHourCount = $one_hour_query->fetch_assoc()['one_hour_count'];

            $three_hours_query = $conn->query("SELECT COUNT(*) AS three_hours_count FROM reservations WHERE hours_reserved = 3");
            $threeHoursCount = $three_hours_query->fetch_assoc()['three_hours_count'];

            $six_hours_query = $conn->query("SELECT COUNT(*) AS six_hours_count FROM reservations WHERE hours_reserved = 6");
            $sixHoursCount = $six_hours_query->fetch_assoc()['six_hours_count'];

            $twelve_hours_query = $conn->query("SELECT COUNT(*) AS twelve_hours_count FROM reservations WHERE hours_reserved = 12");
            $twelveHoursCount = $twelve_hours_query->fetch_assoc()['twelve_hours_count'];

            $twenty_four_hours_query = $conn->query("SELECT COUNT(*) AS twenty_four_hours_count FROM reservations WHERE hours_reserved = 24");
            $twentyFourHoursCount = $twenty_four_hours_query->fetch_assoc()['twenty_four_hours_count'];

            // Define arrays
            $room_categories = ['Economy', 'Deluxe', 'Premium'];
            $reservation_hours = [1, 3, 6, 12, 24];
            $payment_methods = ['Gcash', 'Paymaya', 'Visa'];
            $total_profit = 0;
            $total_pending_profit = 0;


            // Include Bootstrap CSS
            echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>";



            echo "<div class='container mt-5'>";



            echo "<h1 class='text-center mb-4'>Summary and Reports</h1>";





            // Reservation Count Table
            echo "<div class='row'>";
            echo "<div class='col-md-6 mb-4'>";
            echo "<div class='card'>";
            echo "<div class='card-header bg-primary text-white'>Reservation Count</div>";
            echo "<div class='card-body'>";
            echo "<table class='table table-hover'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th scope='col'>Reservation Status</th><th scope='col'>Count</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr><td>Accepted Reservations</td><td>" . $acceptedCount . "</td></tr>";
            echo "<tr><td>Rejected Reservations</td><td>" . $rejectedCount . "</td></tr>";
            echo "<tr><td>Pending Reservations</td><td>" . $pendingCount . "</td></tr>";
            echo "<tr><td>Total Reservations</td><td>" . $totalCount . "</td></tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>"; // End card body
            echo "</div>"; // End card
            echo "</div>"; // End column

            // Reservation Category Table
            echo "<div class='col-md-6 mb-4'>";
            echo "<div class='card'>";
            echo "<div class='card-header bg-info text-white'>Reservation Category</div>";
            echo "<div class='card-body'>";
            echo "<table class='table table-hover'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th scope='col'>Room Category</th><th scope='col'>Count</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr><td>Economy</td><td>" . $economyCount . "</td></tr>";
            echo "<tr><td>Deluxe</td><td>" . $deluxeCount . "</td></tr>";
            echo "<tr><td>Premium</td><td>" . $premiumCount . "</td></tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>"; // End card body
            echo "</div>"; // End card
            echo "</div>"; // End column



            // Profit Summary Table
            echo "<div class='col-md-6 mb-4'>";
            echo "<div class='card'>";
            echo "<div class='card-header bg-success text-white'>Profit Summary</div>";
            echo "<div class='card-body'>";
            echo "<table class='table table-hover'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th scope='col'>Profit Type</th><th scope='col'>Amount</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr><td>Today Profits</td><td>₱" . number_format($dailyProfits, 2) . "</td></tr>";
            echo "<tr><td>Weekly Profit</td><td>₱" . number_format($weeklyProfits, 2) . "</td></tr>";
            echo "<tr><td>Monthly Profit</td><td>₱" . number_format($monthlyProfits, 2) . "</td></tr>";
            echo "<tr><td>Yearly Profit</td><td>₱" . number_format($yearlyProfits, 2) . "</td></tr>";
            echo "<tr><td>Total Profit</td><td>₱" . number_format($totalProfit, 2) . "</td></tr>";

            echo "</tbody>";
            echo "</table>";
            echo "</div>"; // End card body
            echo "</div>"; // End card
            echo "</div>"; // End column


            // Start new table
            echo "<div class='container mt-4'>";
            echo "<div class='card'>";
            echo "<div class='card-header bg-dark text-white'>Profits by Room Category, Reservation Hours, and Payment Method</div>";
            echo "<div class='card-body'>";
            echo "<table class='table table-hover'>";
            echo "<thead class='thead-light'>";
            echo "<tr><th scope='col'>Room Category</th><th scope='col'>Reservation Hours</th><th scope='col'>Payment Method</th><th scope='col'>Accepted Reservations</th><th scope='col'>Reservation Cost</th><th scope='col'>Advance Payment</th><th scope='col'>Remaining Payment</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            // Loop through each room category
            foreach ($room_categories as $room_category) {
                // Loop through each reservation hour
                foreach ($reservation_hours as $hours_reserved) {
                    // Create SQL query
                    $query = $conn->query("SELECT payment_method, reservation_cost, advance_payment, (reservation_cost - advance_payment) AS remaining_payment, COUNT(*) AS accepted_reservations FROM reservations WHERE room_category = '$room_category' AND hours_reserved = $hours_reserved AND status = 'Accepted'");
                    // Fetch result
                    $result = $query->fetch_assoc();
                    // Add advance payment multiplied by accepted reservations to total profit
                    $total_profit += $result['advance_payment'] * $result['accepted_reservations'];
                    // Add remaining payment multiplied by accepted reservations to total pending profit
                    $total_pending_profit += $result['remaining_payment'] * $result['accepted_reservations'];
                    // Display result in table if accepted reservations is greater than 0
                    if ($result['accepted_reservations'] > 0) {
                        echo "<tr><td>$room_category</td><td>$hours_reserved</td><td>" . $result['payment_method'] . "</td><td>" . $result['accepted_reservations'] . "</td><td>₱" . number_format($result['reservation_cost'], 2) . "</td><td>₱" . number_format($result['advance_payment'], 2) . "</td><td>₱" . number_format($result['remaining_payment'], 2) . "</td></tr>";
                    }
                }
            }

            // Display total profit and total pending profit
            echo "<tr class='table-info'><td colspan='6'>Total Profit</td><td>₱" . number_format($total_profit, 2) . "</td></tr>";
            echo "<tr class='table-warning'><td colspan='6'>Total Pending Profit</td><td>₱" . number_format($total_pending_profit, 2) . "</td></tr>";

            // End table
            echo "</tbody>";
            echo "</table>";
            echo "</div>"; // End card body
            echo "</div>"; // End card
            echo "</div>"; // End container

            echo "</div>"; // End row
            echo "</div>"; // End container





            ?>
        </div>
    </div>

</body>

</html>