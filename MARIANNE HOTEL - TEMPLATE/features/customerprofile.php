<?php
// customerprofile.php - Customer profile and reservations

session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');
include 'C:\xampp\htdocs\MARIANNE HOTEL\homepages\faqsbot.php';

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// Fetch user details
$user_query = "SELECT * FROM users WHERE user_id = $user_id";
$user_result = $conn->query($user_query);

// Check if the user details are found
if ($user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
} else {
    echo "User not found";
    exit();
}

// Fetch reservations for the user
$reservations_query = "SELECT * FROM reservations WHERE user_id = $user_id";
$reservations_result = $conn->query($reservations_query);







// Check if the statistics are found

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Add your styles or include external stylesheets here -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>




    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 0 10% 0 10%;
            font-family: 'Montserrat';
            background-image: url('/pictures/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 100px;
            top: 0;
            border-bottom: 2px solid grey;
            background-color: white;
            padding-left: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        header img {
            width: 60px;
        }

        header .title {
            display: flex;
            align-items: center;
        }

        header .title h1 {
            color: black;
            text-transform: uppercase;
            margin-left: 10px;
            font-size: 2rem;
        }

        header .navLinks ul {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            /* Remove default list styles */
        }

        header .navLinks ul li {
            display: flex;
            /* Make list items flex containers */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            margin: 0 20px;
            /* Add spacing between list items if desired */
        }

        header .navLinks ul li a {
            color: black;
            text-decoration: none;
            /* Remove underline from links */
            font-size: 1.5rem;
            font-weight: 400;
        }

        h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;

        }

        h3 {
            color: #333;
            text-align: center;
            font-size: 3rem;
            margin-bottom: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #f0f0f0;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px;
            margin-top: 10px;
            background-color: #86654B;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "Montserrat";
            font-size: 16px;
        }

        .container {
            position: relative;
            margin: 0 auto;
            margin-top: 4%;
            padding: 80px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            height: 90%;
        }

        .logout {
            position: relative;
            float: right;
        }

        .cancel-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .eye {
            width: 30px;
            height: 15px;
            position: relative;
            border-radius: 50%;
            overflow: hidden;
            background: radial-gradient(circle at center, #444 10%, transparent 40%);
        }

        .open {
            background: radial-gradient(circle at center, #444 10%, transparent 40%);
        }

        .closed {
            background: #fff;
        }

        .eyeball {
            width: 10px;
            height: 10px;
            background: radial-gradient(circle at center, #000 10%, #444 40%);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }

        .closed .eyeball {
            background: #fff;
        }

        .container {
            max-height: 700px;
            /* Adjust as needed */
            overflow-y: auto;
        }

        /* For Chrome, Safari and Opera */
        .container::-webkit-scrollbar {
            width: 12px;
        }

        .container::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
            border-radius: 10px;
        }

        .container::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0);
        }

        /* For Internet Explorer and Edge */
        .container {
            -ms-overflow-style: none;
        }

        .container::-ms-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="title">
            <img src="/pictures/logoyata.svg" alt="logo" class="logo" />
            <h1>Marianne</h1>
        </div>

        <nav class="navLinks">
            <ul>
                <li><a href="/homepages/Home.php">Home</a></li>
                <li><a href="/homepages/About.php">About</a></li>
                <li><a href="/homepages/pricing-table.php">Rooms</a></li>
                <li><a href="login.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h3>YOUR RESERVATIONS</h3>
        <div style="text-align: left; margin-bottom: 20px;">
            <h2>Welcome, <?php echo $user["username"]; ?>!</h2>
            <p><i>Your User Id: <?php echo $user["user_id"]; ?></i></p>
        </div>



        <!-- Add a button for toggling details -->
        <button id="toggleButton" onclick="toggleDetails()">Minimize Details</button>

        <!-- Add a status button to display user information -->
        <button id="statusButton">Show Your Status</button>

        <div id="userStatus" style="display: none;">
            <h2>Your Statistics</h2>
            <p>Total Reservations: <?php echo $stats['total_reservations']; ?></p>
            <p>Accepted Reservations: <?php echo $stats['accepted_reservations']; ?></p>
            <p>Rejected Reservations: <?php echo $stats['rejected_reservations']; ?></p>
            <p>Pending Reservations: <?php echo $stats['pending_reservations']; ?></p>
            <p>Total Hours (Accepted): <?php echo $stats['total_hours_accepted']; ?></p>
            <p>Total Cost (Accepted): <?php echo $stats['total_cost_accepted']; ?></p>
            <p>Total Remaining Payment: <?php echo $stats['total_remaining_payment']; ?></p>

        </div>





        <!-- Add a button to update the profile and navigate to updateprofile.php -->
        <a href="updateprofile.php"><button>Update Your Profile</button></a>

        <!-- Add a button to navigate to reservation.php -->
        <a href="reservation.php"><button>Make a Reservation</button></a>

        <!-- Add a button to logout and redirect to login.php -->
        <a class="logout" href="login.php"><button>Logout</button></a>

        <!-- Add a search input field -->
        <label for="search">Search:</label>
        <input type="text" id="search" onkeyup="searchReservations()" placeholder="Enter a keyword...">


        <?php
        // Check if reservations are found
        if ($reservations_result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                        <th>Reservation ID</th>
                        <th>Reservation Date</th>
                        <th>Reservation Time</th>
                        <th>Room Category</th>
                        <th>Hours Reserved</th>
                        <th>Room Number</th>
                        <th>Reservation Cost</th>
                        <th>Remaining Payment</th>
                        <th>Payment Method</th>
                        <th>Advance Payment</th>
                        <th>Reference Number</th>
                        <th>Status</th>
                        <th>Action</th> <!-- Add a new column for action -->
                      </tr>";

            while ($reservation = $reservations_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $reservation["reservation_id"] . "</td>";
                echo "<td>" . $reservation["reservation_date"] . "</td>";
                echo "<td>" . date("h:i A", strtotime($reservation["reservation_time"])) . "</td>";
                echo "<td>" . $reservation["room_category"] . "</td>";
                echo "<td>" . $reservation["hours_reserved"] . "</td>";
                echo "<td>" . $reservation["room_number"] . "</td>";
                echo "<td>" . $reservation["reservation_cost"] . "</td>";
                echo "<td>" . $reservation["remaining_payment"] . "</td>";
                echo "<td>" . $reservation["payment_method"] . "</td>";
                echo "<td>" . $reservation["advance_payment"] . "</td>";
                echo "<td>" . $reservation["reference_number"] . "</td>";
                echo "<td>" . ($reservation["status"] == 'Accepted' || $reservation["status"] == 'Rejected' ? $reservation["status"] : 'Pending') . "</td>";
                echo "<td>";

                // Display the "Cancel" button for pending reservations or where status is null
                if ($reservation["status"] == 'Pending' || $reservation["status"] === null) {
                    echo '<button class="cancel-btn" onclick="cancelReservation(' . $reservation["reservation_id"] . ')">Cancel</button>';
                }

                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No reservations found.";
        }

        ?>
    </div>
    </div>




</body>
<script src="https://kit.fontawesome.com/fb68db4d3c.js" crossorigin="anonymous"></script>

</html>

<?php
// Close the database connection
$conn->close();
?>