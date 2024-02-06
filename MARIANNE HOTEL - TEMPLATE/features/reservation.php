<?php
// reservation.php - Reservation page


session_start();
require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php');
include 'C:\xampp\htdocs\MARIANNE HOTEL\homepages\faqsbot.php';


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Reservation Page</title>
    <!-- Add your styles or include external stylesheets here -->
    <style>
        /* ... (your existing styles) */

        body {
            background-image: url('/pictures/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Montserrat', sans-serif;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            max-width: 600px;
            max-height: 80%;
            overflow-y: auto;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        #reservation-notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            z-index: 1000;
            display: none;
        }

        /* Style for the notification content */
        .notification-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Style for the close button */
        .close-btn {
            cursor: pointer;
            font-size: 20px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translate(-50%, -50%);
            }

            to {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
        }

        .nav-link.active {
            color: white !important;
            background-color: #86654B !important;
        }

        .section {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            height: 100%;
        }

        .section h3 {
            color: #86654B;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #FFFFFF;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            background-color: #86654B;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .btn:hover {
            color: #fff;
            background-color: #6d5138;
            border-color: #6d5138;
        }

        button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        button:hover {
            background-color: #45a049;
        }

        .container {
            max-width: 80%;
            max-height: 100vh;
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

        .container label,
        .container input,
        .container select {
            border: none;
            padding: 7px;
            display: block;
            width: 100%;
            margin-bottom: 5px;
            border-bottom: 1px solid grey;
            background-color: #f9f9f9;
        }

        .container label {
            border: none;
        }

        .label {
            display: flex;
            align-items: center;
        }

        .label input {
            margin-top: -2%;
            width: 5%;
            margin-left: 2%;
            height: 25px;
        }

        .payment {
            border: none;
        }

        .message {
            margin-top: 5px;
            color: green;
            font-weight: bolder;
        }
    </style>


</head>

<body>
    <form action="reservation.php" method="post" onsubmit="return validateReservation()">
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h2 style="font-size: 40px;"><b>MAKE A RESERVATION</b></h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Reservation Details -->
                        <div class="col-md-6">
                            <div class="section">


                                <h3><b>ROOM DETAILS</b></h3>
                                <p class="room-cat"><label for="room_category"><b>Room Category:</b></label>
                                    <select id="room_category" name="room_category" required onchange="updateRoomNumber()">
                                        <option value="Economy">Economy</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Premium">Premium</option>
                                    </select>

                                    <button type="button" class="btn" onclick="showRoomCategoryInfo()">Room Category Informations</button>


                                    <br>
                                    <label for="reservation_date"><b>Reservation Date:</b></label>
                                    <input type="date" id="reservation_date" name="reservation_date" required><br>


                                    <label for="reservation_time"><b>Reservation Time:</b></label>
                                    <input type="time" id="reservation_time" name="reservation_time" required><br>




                                    <label for="hours_reserved"><b>Hours Reserved:</b></label>
                                    <select id="hours_reserved" name="hours_reserved" required>
                                        <option value="1">1 hour</option>
                                        <option value="3">3 hours</option>
                                        <option value="6">6 hours</option>
                                        <option value="12">12 hours</option>
                                        <option value="24">24 hours</option>
                                    </select><br>

                                    <label for="room_number"><b>Room Number:</b></label>
                                    <select id="room_number" name="room_number" required>
                                        <?php
                                        foreach ($room_numbers as $room) {
                                            echo "<option value='$room'>$room</option>";
                                        }
                                        ?>
                                    </select>

                                    <button type="button" class="btn" id="room_search_button">Room Search</button>

                                <h3><b>PERSONAL DETAILS</b></h3>
                                <p><label for="emailaddress"><b>Email Address:</b></label>
                                    <input type="text" id="emailaddress" name="emailaddress" required><br>


                            </div>
                        </div>


                        <!-- Payment and Personal Details -->
                        <div class="col-md-6">
                            <div class="section">
                                <h3><b>PAYMENT DETAILS</b></h3>
                                <p><label for="payment_method">Payment Method:</label>
                                    <select class="payment" id="payment_method" name="payment_method" required>
                                        <option value="Gcash">Gcash</option>
                                        <option value="Paymaya">Paymaya</option>
                                        <option value="Visa">Visa</option>
                                    </select><br>



                                    <label for="advance_payment"><b>Advance Payment:</b></label>
                                    <input type="text" id="advance_payment" name="advance_payment" readonly>

                                    <button type="button" class="btn" onclick="togglePayment()" id="payment_button">Full Advance Payment</button>

                                    <br>
                                    <label for="reservation_cost"><b>Reservation Cost:</b></label>
                                    <input type="text" id="reservation_cost" name="reservation_cost" value="" readonly><br>

                                    <label for="remaining_payment"><b>Remaining Payment:</b></label>
                                    <input type="text" id="remaining_payment" name="remaining_payment" readonly><br>

                                    <label for="reference_number"><b>Reference Number:</b></label>
                                    <input type="text" id="reference_number" name="reference_number" required><br>
                                </p>

                                <div class="label">
                                    <p class="agree">I agree to the terms</p>
                                    <input class="checkbox" type="checkbox" id="terms_agreement" name="terms_agreement" required>
                                </div>

                                <a href="#" id="showTerms">Terms and Conditions</a><br>
                                <button type="submit" class="btn">Submit Reservation</button>

                            </div>
                        </div>
                    </div>

                    <a href="customerprofile.php" class="btn" style="margin-top: 10px;">Back to Customer Profile</a>
                </div>
            </div>
        </div>
    </form>
</body>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>