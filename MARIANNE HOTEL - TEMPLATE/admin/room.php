<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "hotel1");

// Include the database configuration file
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

// Query the database for room availability
$result = mysqli_query($con, "SELECT * FROM reservations");



// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title>Admin Table</title>
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



    <style>
        .filter-buttons {
            display: flex;
            justify-content: center;
            /* Horizontally center the buttons */
            align-items: center;
            /* Vertically center the buttons */
            margin-bottom: 20px;
        }

        .filter-button {
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }

        .filter-button:hover {
            opacity: 0.8;
        }

        .accepted {
            background-color: #4CAF50;
            /* Green */
        }

        .available {
            background-color: #86654B;
        }

        .pending {
            background-color: #ff9800;
            /* Orange */
        }

        .all {
            background-color: #008CBA;
            /* Blue */
        }

        .bg-purple {
            background-color: purple;
        }

        .bg-orange {
            background-color: orange;
        }

        .bg-red {
            background-color: red;
        }

        .bg-light-blue {
            background-color: lightblue;
        }

        .bg-green {
            background-color: green;
        }

        .accepted,
        .pending,
        .all,
        .available {
            color: white;
            /* White text */
        }

        .accepted {
            background-color: #4CAF50;
            /* Green */
        }

        .available {
            background-color: #36454F;
            /* Charcoal background */
            color: white;
            /* White text */
        }

        .pending {
            background-color: #ff9800;
            /* Orange */
        }

        .all {
            background-color: #008CBA;
            /* Blue */
        }
    </style>

    <!-- Then in your PHP code where you fetch the reservations -->
    <?php
    $status = $_POST['status'] ?? 'All';

    $query = "SELECT * FROM reservations";
    if ($status !== 'All') {
        $query .= " WHERE status = '$status'";
    }
    $query .= " ORDER BY reservation_id ASC"; // Order by reservation_id from oldest to latest

    ?>
    <style>
        .container {
            font-size: 0.6em;
            /* Adjust this value to change the font size */
        }

        .container table {
            width: 100%;
            /* This will make the table width equal to its container's width */
            overflow-x: auto;
            /* This will add a horizontal scrollbar if the content exceeds the width */
            display: block;
            /* This is necessary for overflow to work */
        }
    </style>





    <script src="https://kit.fontawesome.com/fb68db4d3c.js" crossorigin="anonymous"></script>


    <section>
        <div class="mainContent" style="width: 90%; margin: auto; margin-left: 20px; margin-right: 20px;">
            <div class="headerWrapper">
                <div class="headerTitle">
                    <span>Admin</span>
                    <h2>Room Availbility</h2>
                </div>
                <div class="searchBox">
                    <div class="userInfo">
                        <input type="text" id="searchInput" placeholder="Search">
                        <img src="\pictures\admin.jpg" alt="ADMIN PIC">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Room Number</th>
                                <th>Room Category</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="filter-buttons">
                                <button class="filter-button all">All</button>
                                <button class="filter-button accepted">Accepted</button>
                                <button class="filter-button pending">Pending</button>
                                <button class="filter-button available">Available</button>
                            </div>






                            <?php
                            function checkRoomAvailability($status)
                            {
                                // Connect to the database
                                $con = mysqli_connect("localhost", "root", "", "hotel1");

                                // Include the database configuration file
                                require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');

                                // Query the database for all rooms
                                $query = "SELECT * FROM reservations";
                                $result = mysqli_query($con, $query);

                                // Create a list of room numbers up to 33
                                $room_numbers = range(1, 33);

                                // Create an array to store the room numbers and their statuses
                                $rooms = array_fill_keys($room_numbers, 'N/A');

                                // Loop through the results and update the room statuses in the array
                                while ($row = mysqli_fetch_array($result)) {
                                    $rooms[$row['room_number']] = $row['status'];
                                }

                                // Loop through the list of room numbers
                                foreach ($rooms as $room_number => $room_status) {
                                    // If the status is 'N/A' or 'Rejected', mark it as available
                                    if ($room_status == 'N/A' || $room_status == 'Rejected') {
                                        $room_status = 'Available';
                                    }

                                    // If a specific status is requested, skip the rooms that don't match
                                    if ($status !== 'All' && $room_status !== $status) {
                                        continue;
                                    }

                                    // If the status is 'Available', display the room number
                                    if ($room_status == 'Available') {
                                        echo "<tr>";
                                        echo "<td>" . $room_number . "</td>";

                                        // Determine the room category based on the room number
                                        if ($room_number <= 15) {
                                            echo "<td>Economy</td>";
                                        } elseif ($room_number <= 25) {
                                            echo "<td>Deluxe</td>";
                                        } else {
                                            echo "<td>Premium</td>";
                                        }

                                        echo "<td class='available' style='background-color: #36454F; color: white;'>Available</td>";
                                        echo "</tr>";
                                    }
                                }

                                // Close the database connection
                                mysqli_close($con);
                            }

                            // Call the function to check room availability
                            // Replace 'All' with the appropriate status based on the button clicked
                            checkRoomAvailability('All');
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
</body>

</html>