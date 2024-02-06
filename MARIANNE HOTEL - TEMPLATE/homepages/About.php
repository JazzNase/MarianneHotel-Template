<?php
include 'faqsbot.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="aa" class=" inside_page inside_page_header_design s_layout15 isFreePackage  ">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

  <!-- Mobile Browser Address Bar Color -->
  <meta name="theme-color" content="#000000">
  <!-- Regular Meta Info -->
  <title class="s123-js-pjax">About - Marianne's Hotel</title>
  <meta name="description" content="About - Marianne's Hotel" class="s123-js-pjax">

  <!-- Facebook Meta Info -->
  <meta property="og:url" content="https://64436e4ca3853.site123.meAbout.php" class="s123-js-pjax">
  <meta property="og:image" content="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/800_5cda52472f559.jpg" class="s123-js-pjax">
  <meta property="og:description" content="About - Marianne's Hotel" class="s123-js-pjax">
  <meta property="og:title" content="About - Marianne's Hotel" class="s123-js-pjax">
  <meta property="og:site_name" content="Marianne's Hotel" class="s123-js-pjax">
  <meta property="og:see_also" content="https://64436e4ca3853.site123.me" class="s123-js-pjax">
  <!-- Google+ Meta Info -->
  <meta itemprop="name" content="About - Marianne's Hotel" class="s123-js-pjax">
  <meta itemprop="description" content="About - Marianne's Hotel" class="s123-js-pjax">
  <meta itemprop="image" content="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/800_5cda52472f559.jpg" class="s123-js-pjax">
  <!-- Twitter Meta Info -->
  <meta name="twitter:card" content="summary" class="s123-js-pjax">
  <meta name="twitter:url" content="https://64436e4ca3853.site123.meAbout.php" class="s123-js-pjax">
  <meta name="twitter:title" content="About - Marianne's Hotel" class="s123-js-pjax">
  <meta name="twitter:description" content="About - Marianne's Hotel" class="s123-js-pjax">
  <meta name="twitter:image" content="https://static1.s123-cdn-static-a.com/ready_uploads/media/5054/800_5cda52472f559.jpg" class="s123-js-pjax">
  <meta name="robots" content="all" class="s123-js-pjax">
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
      padding: 0 20px;
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

    /* ABOUT STYLE */
    .aboutSection {
      width: 100%;
      height: 70vh;
      margin-top: 40px;
      padding: 5%;
      margin-bottom: 5%;
    }

    .aboutSection .left {
      width: 50%;
      float: left;
    }

    .aboutSection img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .aboutSection .right {
      width: 50%;
      float: right;
      padding: 2% 20px 10px 20px;
      text-align: justify;

    }

    .aboutSection .right h1 {
      font-size: 2.5rem;
      text-align: center;
      margin-bottom: 20px;
    }

    .aboutSection .right .rightT {
      text-indent: 50px;
    }

    /* Carousel0 */
    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

      .prev,
      .next,
      .text {
        font-size: 11px
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdn-cms-s.f-static.net/versions/2/css/websiteCSS.css?w=&orderScreen=&websiteID=7874242&onlyContent=&tranW=&v=css_y199_42283222" class="reloadable-css" type="text/css">

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
    <section class="aboutSection">
      <div class="left">
        <div class="slideshow-container">

          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="/pictures/economy.png" style="width:100%">
            <div class="text">Economy</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="/pictures/Deluxe.png" style="width:100%">
            <div class="text">Deluxe</div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="/pictures/premium.png" style="width:100%">
            <div class="text">Premium</div>
          </div>

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>
      </div>

      <div class="right">
        <p style="text-align: justify; margin-left: 20px;">CEO</p>
        <h3 style="text-align: justify; margin: 20px;">Lorem Ipsum</h3>
        <p style="text-align: justify; text-indent: 50px; margin: 20px;"><b><i>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</b></i></p>
        <p style="text-align: justify; margin: 20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.
        </p>
      </div>
    </section>
  </main>


  <script src="https://kit.fontawesome.com/fb68db4d3c.js" crossorigin="anonymous"></script>
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>
</body>

</html>