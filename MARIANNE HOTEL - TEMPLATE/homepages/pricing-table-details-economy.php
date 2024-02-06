<?php
include 'faqsbot.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="aa" class=" inside_page inside_page_header_design s_layout15 isFreePackage  ">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <!-- Mobile Browser Address Bar Color -->
  <meta name="theme-color" content="#000000">
  <!-- Regular Meta Info -->
  <title class="s123-js-pjax">Pricing Table - Marianne's Hotel</title>
  <meta name="description" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta name="keywords" content="" class="s123-js-pjax">

  <!-- Facebook Meta Info -->
  <meta property="og:url" content="https://64436e4ca3853.site123.me/pricing-table" class="s123-js-pjax">
  <meta property="og:image" content="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/800_5cda52472f559.jpg" class="s123-js-pjax">
  <meta property="og:description" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta property="og:title" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta property="og:site_name" content="Marianne's Hotel" class="s123-js-pjax">
  <meta property="og:see_also" content="https://64436e4ca3853.site123.me" class="s123-js-pjax">
  <!-- Google+ Meta Info -->
  <meta itemprop="name" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta itemprop="description" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta itemprop="image" content="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/800_5cda52472f559.jpg" class="s123-js-pjax">
  <!-- Twitter Meta Info -->
  <meta name="twitter:card" content="summary" class="s123-js-pjax">
  <meta name="twitter:url" content="https://64436e4ca3853.site123.me/pricing-table" class="s123-js-pjax">
  <meta name="twitter:title" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta name="twitter:description" content="Pricing Table - Marianne's Hotel" class="s123-js-pjax">
  <meta name="twitter:image" content="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/800_5cda52472f559.jpg" class="s123-js-pjax">
  <meta name="robots" content="all" class="s123-js-pjax">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <!-- Website CSS variables -->

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Montserrat';
    }

    body {
      padding: 0 10% 0 10%;
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

    /* ROOMS STYLE */
    .roomContainer {
      position: relative;
      width: 100%;
      height: 87vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .roomContainer .top {
      width: 80%;
      text-align: center;
      padding: 0 20% 0 20%;
      border-bottom: 2px solid grey;
    }

    .roomContainer .top h1 {
      text-transform: uppercase;
    }

    .roomContainer .top p {
      line-height: 20px;
    }

    .roomContainer .rooms {
      display: flex;
      justify-content: space-evenly;
      /* align-items: center; */
      width: 100%;
      height: 70vh;
      gap: 10px;
      padding-top: 10px;
    }

    /* .roomContainer .rooms .card{
    background-color: violet;
    width: 40%;
    height: 80%;
}

.roomContainer .rooms .card img{
    width: 70%;

    object-fit: contain;
} */
    .container {
      background-color: #D1C8C1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      height: 60vh;
      width: 35%;
    }

    .containerDet {
      background-color: #D1C8C1;
      padding: 20px;
      height: 60vh;
      width: 35%;
    }

    .wrapper {
      width: 100%;
      height: 80%;
    }

    .wrapperDet {
      width: 100%;
      height: 80%;
    }

    .wrapperDet p {
      margin-top: 20px;
      text-align: center;
      font-size: 1rem;
      line-height: 10px;
    }

    .wrapperDet h1 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 25px;
    }

    .banner-image1 {
      background-image: url(goldBG.jpg);
      background-position: center;
      background-size: cover;
      height: 250px;
      width: 100%;
    }

    .banner-image2 {
      background-image: url(regbg.jpg);
      background-position: center;
      background-size: cover;
      height: 250px;
      width: 100%;
    }

    .banner-image3 {
      background-image: url(/pictures/economy.png);
      background-position: center;
      background-size: cover;
      height: 250px;
      width: 100%;
    }

    .container h1 {
      font-family: 'Righteous', sans-serif;
      color: rgba(255, 255, 255, 0.98);
      text-transform: uppercase;
      font-size: 2.4rem;
    }

    .container p {
      color: #fff;
      font-family: 'Lato', sans-serif;
      text-align: center;
      font-size: 0.8rem;
      line-height: 150%;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .button-wrapper {
      margin-top: 18px;
      display: flex;
    }

    .btn {
      border: none;
      padding: 12px 24px;
      border-radius: 24px;
      font-size: 12px;
      font-size: 0.8rem;
      letter-spacing: 2px;
      cursor: pointer;
    }

    .btn+.btn {
      margin-left: 10px;
    }

    .outline {
      background: transparent;
      color: rgba(0, 212, 255, 0.9);
      border: 1px solid rgba(0, 212, 255, 0.6);
      transition: all .3s ease;

    }

    .outline:hover {
      transform: scale(1.125);
      color: rgba(255, 255, 255, 0.9);
      border-color: rgba(255, 255, 255, 0.9);
      transition: all .3s ease;
    }

    .fill {
      background: rgba(0, 212, 255, 0.9);
      color: rgba(255, 255, 255, 0.95);
      filter: drop-shadow(0);
      font-weight: bold;
      transition: all .3s ease;
    }

    .fill:hover {
      transform: scale(1.125);
      border-color: rgba(255, 255, 255, 0.9);
      filter: drop-shadow(0 10px 5px rgba(0, 0, 0, 0.125));
      transition: all .3s ease;
    }

    form button {
      border: none;
      padding: 12px 24px;
      border-radius: 24px;
      font-size: 10px;
      font-size: 0.8rem;
      letter-spacing: 2px;
      cursor: pointer;
    }
  </style>
  <link rel="stylesheet" href="https://cdn-cms-s.f-static.net/versions/2/css/websiteCSS.css?w=&orderScreen=&websiteID=7874242&onlyContent=&tranW=&v=css_y199_42283222" class="reloadable-css" type="text/css">
  <!-- Froala Editor CSS -->
  <!-- Google AdSense -->
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
    <section class="roomContainer">
      <div class="top">
        <h1>Lorem Ipsum</h1>
        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
      </div>

      <div class="rooms">
        <div class="container">
          <div class="wrapper">
            <div class="banner-image3">
              <img style="height: 250px; width: 350px  ;" src="/pictures/economy.png" alt="economy Image">
            </div>
            <h1>Lorem Ipsum</h1>
            <p>Lorem Ipsum</p>
          </div>
          <div class="button-wrapper">
            <button class="btn outline"><a href="pricing-table.php">Hide Details</a></button>
            <form action="/features/login.php" method="GET">
              <button class="btn fill" type="submit" role="button" data-module="64437820ffd53" data-unique-page="64437820f0862" data-tranw="" aria-label="Reserve Now">Reserve Now</button>
            </form>
          </div>
        </div>

        <div class="containerDet">
          <div class="wrapperDet">
            <h1>DETAILS</h1>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
            <br>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
            <p>Lorem Ipsum</p>
          </div>
        </div>

      </div>
    </section>
  </main>


  <script src="https://kit.fontawesome.com/fb68db4d3c.js" crossorigin="anonymous"></script>
</body>

</html>