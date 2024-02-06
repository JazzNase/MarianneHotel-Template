<?php require_once('C:\xampp\htdocs\MARIANNE HOTEL\db_config.php'); ?>

<?php
include 'faqsbot.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="aa" class=" home_page home_page_design s_layout15 isFreePackage  ">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <link rel="preload" href="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/2000_5cda52472f559.jpg" as="image">
    <!-- Mobile Browser Address Bar Color -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="theme-color" content="#000000">
    <!-- Regular Meta Info -->
    <title class="s123-js-pjax">Marianne's Hotel</title>
    <meta name="description" content="Marianne's Hotel" class="s123-js-pjax">
    <meta name="keywords" content="" class="s123-js-pjax">
    <link rel="stylesheet" href="https://cdn-cms-s.f-static.net/versions/2/css/websiteCSS.css?w=&orderScreen=&websiteID=7874242&onlyContent=&tranW=&v=css_y199_42283222" class="reloadable-css" type="text/css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 0 10% 0 10%;
            font-family: 'Montserrat';
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 100px;
            top: 0;
            border-bottom: 2px solid grey;
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

        /* HOME STYLE */
        .mainHome {
            padding-top: 10px;
            width: 100%;
            height: 80vh;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        .mainHome .top {
            position: relative;
            background: url("/pictures/home.png");
            /* Adjust the path based on your project structure */
            background-size: cover;
            background-position: center center;
            width: 100%;
            height: 500px;
        }



        .mainHome .top .clean {
            position: absolute;
            top: 10%;
            left: 3%;
            color: whitesmoke;
            font-size: 1.3rem;
            line-height: 50px;
        }

        .mainHome .bottom {
            display: flex;
            margin-top: 10px;
            gap: 10px;
        }

        .mainHome .bottom .one {
            text-align: justify;
            margin-right: 25px;
            padding: 10px;
        }

        .bottom img {
            width: 220px;
            height: 160px;

        }

        .bottom .bottom-btn {
            border-radius: 28px;
            font-size: 25px;
            background: #86654B;
            padding: 3px 40px 5px 40px;
            text-decoration: none;
            border: none;
            margin: auto;
            margin-left: 0;
            font-family: 'Montserrat';

        }

        .bottom .bottom-btn a {
            color: white;
        }

        .bottom .bottom-btn:hover {
            background: #3cb0fd;
            text-decoration: none;
            transition: 0.3s;
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
                <li><a href="Home.php">Home</a></li>
                <li><a href="About.php">About</a></li>
                <li><a href="pricing-table.php">Rooms</a></li>
                <li><a href="/features/login.php"><i class="fa-regular fa-user"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="mainHome">
            <div class="top">
                <div class="clean">
                    <h1>Clean. <br> Home. <br> Care.</h1>
                </div>
            </div>

            <div class="bottom">
                <div class="one">
                    <p style="font-size: 25px;"> Welcome to <b>Marianne's Hotel</b> </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
                    <button class="bottom-btn"><a href="../features/login.php">Book Now</a></button>
                </div>
                <div>
                    <img src="/pictures/homebed1.png" alt="" />
                </div>
                <div>
                    <img src="/pictures/homebed2.png" alt="" />
                </div>
                <div>
                    <img src="/pictures/homebed3.png" alt="" />
                </div>
            </div>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/fb68db4d3c.js" crossorigin="anonymous"></script>
</body>

</html>