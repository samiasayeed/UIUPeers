<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UIUPeers</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="./Landing page/assets/img/favicon.png" rel="icon"> -->
  <link href="./Landing page/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  

<style>

  /**
* Template Name: Siimple
* Updated: Sep 18 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/free-bootstrap-landing-page/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
}

a {
  text-decoration: none;
  color: #fd680e;
}

a:hover {
  color: #ff8f4c;
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6,
.font-primary {
  font-family: "Raleway", sans-serif;
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  height: 80px;
  padding: 20px 0;
  z-index: 10;
  position: relative;
}

#header .logo h1 {
  font-size: 36px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 300;
  letter-spacing: 3px;
}

#header .logo h1 a,
#header .logo h1 a:hover {
  color: #fff;
  text-decoration: none;
}

#header .logo img {
  padding: 0;
  margin: 0;
  max-height: 40px;
}

@media (max-width: 768px) {
  #header .logo h1 {
    font-size: 28px;
    padding: 8px 0;
  }
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
.nav-menu {
  position: fixed;
  top: 0;
  bottom: 0;
  z-index: 9999;
  overflow-y: auto;
  right: -260px;
  width: 260px;
  padding-top: 18px;
  background: rgba(34, 34, 34, 0.8);
  transition: 0.4s;
}

.nav-menu * {
  margin: 0;
  padding: 0;
  list-style: none;
}

.nav-menu a,
.nav-menu a:focus {
  display: block;
  position: relative;
  color: #ffd2b7;
  padding: 10px 20px;
  font-weight: 500;
  transition: 0.3s;
}

.nav-menu a:hover,
.nav-menu .active>a,
.nav-menu li:hover>a {
  color: #ffa26a;
  text-decoration: none;
}

.nav-menu .drop-down>a:after {
  content: "\ea27";
  font-family: "boxicons";
  padding-left: 10px;
  position: absolute;
  right: 15px;
}

.nav-menu .active.drop-down>a:after {
  content: "\ea27";
}

.nav-menu .drop-down>a {
  padding-right: 35px;
}

.nav-menu .drop-down ul {
  display: none;
  overflow: hidden;
}

.nav-menu ul.drop-down-active {
  display: block;
}

.nav-menu .drop-down li {
  padding-left: 20px;
}

.nav-menu-active {
  right: 0;
}

.nav-toggle {
  position: fixed;
  right: 15px;
  top: 15px;
  z-index: 9998;
  border: 0;
  /* background: rgba(34, 34, 34, 0.5); */
  transition: all 0.4s;
  outline: none !important;
  line-height: 1;
  cursor: pointer;
  text-align: right;
  padding: 10px 12px;
  border-radius: 2px;
}

.nav-toggle button {
  color: black;
  font-weight: 800;
  border-radius: 20%;
  padding: 10px;
  margin-right: 10px;
  font-size: 18px;
}

.nav-toggle-active {
  right: 275px;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}

.navbar li {
  position: relative;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0 10px 30px;
  font-family: "Raleway", sans-serif;
  font-size: 16px;
  font-weight: 700;
  color: #884922;
  white-space: nowrap;
  transition: 0.3s;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  color: #fd680e;
}

.navbar .getstarted,
.navbar .getstarted:focus {
  background: #fd680e;
  padding: 8px 20px;
  margin-left: 30px;
  border-radius: 4px;
  color: #fff;
}

.navbar .getstarted:hover,
.navbar .getstarted:focus:hover {
  color: #fff;
  background: #fd7827;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 14px;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
  border-radius: 4px;
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 15px;
  text-transform: none;
  font-weight: 600;
}

.navbar .dropdown ul a i {
  font-size: 12px;
}

.navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: #fd680e;
}

.navbar .dropdown:hover>ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}

.navbar .dropdown .dropdown:hover>ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #743e1d;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

.mobile-nav-toggle.bi-x {
  color: #fff;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: rgba(75, 40, 19, 0.9);
  transition: 0.3s;
}


.navbar-mobile .getstarted,
.navbar-mobile .getstarted:focus {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover,
.navbar-mobile .dropdown ul .active:hover,
.navbar-mobile .dropdown ul li:hover>a {
  color: #fd680e;
}

.navbar-mobile .dropdown>.dropdown-active {
  display: block;
}

/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  height: 80vh;
  background: url("./Landing page/assets/img/UIU-Banner.jpg") center center;
  background-size: cover;
  position: relative;
  margin-top: -80px;
  z-index: 9;
}

#hero .hero-container {
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  padding: 0 15px;
}

#hero h1 {
  margin: 0 0 10px 0;
  font-family: 'Crimson Text', serif;
  font-size: 8rem;
  font-weight: 700;
  line-height: 56px;
  line-height: 56px;
  color: #f38b23;
}

#hero h2 {
  color: #eee;
  font-family: 'Open Sans', sans-serif;
  margin-top: 180px;
  font-weight: 800;
  font-size: 2rem;
}

#hero p {
  color: #eee;
  font-family: 'Open Sans', sans-serif;
  font-weight: 500;
  font-size: 1.2rem;
}

#hero .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

#hero .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

#hero .php-email-form .loading {
  display: none;
  background: rgba(255, 255, 255, 0.5);
  text-align: center;
  padding: 15px;
  border-radius: 50px;
}

#hero .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  animation: animate-loading-notify 1s linear infinite;
}

@keyframes animate-loading-notify {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

#hero .php-email-form input {
  border-radius: 50px;
  box-shadow: none;
  font-size: 14px;
  border: 0;
  padding: 0px 15px 2px 20px;
  width: 250px;
  height: 40px;
  margin: 0 8px;
}

#hero .php-email-form button[type=submit] {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 30px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 10px;
  border: none;
  color: #fff;
  background: #fd680e;
}

#hero .php-email-form button[type=submit]:hover {
  background: #fd8841;
}

@media (min-width: 1024px) {
  #hero {
    background-attachment: fixed;
  }
}

@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }

  #hero h2 {
    font-size: 18px;
    line-height: 24px;
    margin-bottom: 30px;
  }

  #hero .php-email-form input {
    margin: 0 auto;
  }
}

/*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
section {
  padding: 80px 0;
}

.section-bg {
  background-color: #fff7f2;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: 300;
  margin-bottom: 20px;
  padding-bottom: 15px;
  position: relative;
}

.section-title h2::after {
  content: "";
  position: absolute;
  display: block;
  width: 80px;
  height: 1px;
  background: #fd680e;
  bottom: 0;
  left: calc(50% - 40px);
}

.section-title p {
  margin-bottom: 0;
  font-style: italic;
  color: #666666;
}



/*--------------------------------------------------------------
# Why Us
--------------------------------------------------------------*/
.why-us {
  padding-bottom: 30px;
}

.why-us .card {
  border-radius: 3px;
  border: 0;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
}

.why-us .card-icon {
  text-align: center;
  margin-top: -32px;
}

.why-us .card-icon  {
  font-size: 32px;
  color: #fff;
  width: 100%;
  height: 64px;
  padding-top: 0px;
  text-align: center;
  background-color: #fd680e;
  text-align: center;
  transition: 0.3s;
  display: inline-block;
}

.why-us .card-body {
  padding-top: 40px;
  font-family: 'Montserrat', sans-serif;
  font-weight: bolder;
  font-size: 1.1rem;
}

.why-us .card-title {
  font-weight: 700;
  text-align: center;
  font-family: 'Montserrat', sans-serif;
  font-size: 1.5rem;
  padding-top: 15px;
}

.why-us .card-title a {
  color: #fff;
  transition: 0.3s;
  text-wrap: stable;
}

.why-us .card-title a:hover {
  color: #fd680e;
  
}

.why-us .card-text {
  color: #5e5e5e;
}

.why-us .card:hover .card-icon i {
  background: #fff;
  color: #fd680e;
}


@media (max-width: 1024px) {
  .why-us {
    background-attachment: scroll;
  }
}

/*--------------------------------------------------------------
# Frequenty Asked Questions
--------------------------------------------------------------*/
.faq {
  padding-bottom: 60px;
}

.faq .faq-list {
  padding: 0;
  list-style: none;
}

.faq .faq-list li {
  border-bottom: 1px solid #eee;
  margin-bottom: 20px;
  padding-bottom: 20px;
}

.faq .faq-list a {
  display: block;
  position: relative;
  font-family: #fd680e;
  font-size: 18px;
  line-height: 24px;
  font-weight: 400;
  padding-right: 25px;
  cursor: pointer;
}

.faq .faq-list i {
  font-size: 24px;
  position: absolute;
  right: 0;
  top: 0;
}

.faq .faq-list p {
  margin-bottom: 0;
  padding: 10px 0 0 0;
}

.faq .faq-list .icon-show {
  display: none;
}

.faq .faq-list a.collapsed {
  color: #343a40;
}

.faq .faq-list a.collapsed:hover {
  color: #fd680e;
}

.faq .faq-list a.collapsed .icon-show {
  display: inline-block;
}

.faq .faq-list a.collapsed .icon-close {
  display: none;
}

/*--------------------------------------------------------------
# Contact Us
--------------------------------------------------------------*/
.contact .info {
  color: #444444;
}

.contact .info i {
  font-size: 32px;
  color: #fd680e;
  float: left;
}

.contact .info p {
  padding: 0 0 10px 50px;
  margin-bottom: 20px;
  line-height: 22px;
  font-size: 14px;
}

.contact .info .email p {
  padding-top: 5px;
}

.contact .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #5a2c10;
  color: #fff;
  line-height: 1;
  padding: 8px 0;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}

.contact .social-links a:hover {
  background: #fd680e;
  color: #fff;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .error-message br+br {
  margin-top: 25px;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input,
.contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

.contact .php-email-form input:focus,
.contact .php-email-form textarea:focus {
  border-color: #fd680e;
}

.contact .php-email-form button[type=submit] {
  background: #fd680e;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
}

.contact .php-email-form button[type=submit]:hover {
  background: #fd8841;
}

@media (max-width: 768px) {
  .contact .social-links {
    text-align: center;
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
  background: #2f1708;
  padding: 30px 0;
  color: #fff;
  font-size: 14px;
}

#footer .copyright {
  text-align: center;
}

#footer .credits {
  padding-top: 10px;
  text-align: center;
  font-size: 13px;
  color: #fff;
}
</style>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container-fluid">

      <div class="logo">
        <!-- <h1><a href="index.html">Siimple</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <div class="nav-toggle">
        <button type="button" class="btn" style="background-color: #f38b23;"><a href="./register1.php" style="color: white;">Sign Up</a></button>
        <button type="button" class="btn btn-outline-warning"><a href="./login.php" style="color: white;">Log In</a></button>
      </div>
      <!-- <button type="button" class="nav-toggle">Sign in</button> -->
     
      
      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#header" class="scrollto">Home</a></li>
          <li><a href="#about" class="scrollto">About Us</a></li>
          <li><a href="#why-us" class="scrollto">Why Us</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact" class="scrollto">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>UIUPeers</h1>
      <h2>3 PROBLEMS 1 SOLUTION</h2>
      <p>Study, Food and Accomodation related problems solved!</p>

    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <!-- <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="./Landing page/assets/img/about-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>

      </div>
    </section> -->
    
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <img src="./Landing page/assets/img/pic 1.png" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="bx bx-book-reader"></i>
                <h5 class="card-title"><a href="">STUDY</a></h5>
              </div>
              <div class="card-body">
                <ul>
                  <li>COURSE REVIEW</li>
                  <li>FACULTY RATING</li>
                  <li>BOOK EXCHANGE OR SALE</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <img src="./Landing page/assets/img/pic 2.png" class="card-img-top" alt="...">
              <div class="card-icon">
                <h5 class="card-title"><a href="">FOOD</a></h5>
              </div>
              <div class="card-body">
              <ul>
                <li>CATERING SERVICE</li>
                  <li>FOOD REVIEW</li>
                  <li>ON TIME ORDER</li>
                </ul>
              </ul> 
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <img src="./Landing page/assets/img/pic 3.png" class="card-img-top" alt="...">
              <div class="card-icon">
                <h5 class="card-title"><a href="">ACCOMMODATION</a></h5>
              </div>
              <div class="card-body">
              <UL>
                <li>ROOM RENT</li>
                  <li>HOSTEL</li>
                  <li>SEAT VACANCY</li>
              </UL>  
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Frequenty Asked Questions Section ======= -->
    <section class="faq">
      <div class="container">

        <div class="section-title">
          <h2>Frequenty Asked Questions</h2>
        </div>

        <ul class="faq-list">

          <li>
            <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Why UIUPeers? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
              UIUPeers simplifies UIUians life by offering a one-stop solution for accommodation, food, and study services. Save time, find tailored options, and enhance your student experience—all in one place!

              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">What services does this platform offer for accommodation? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
              We provide a range of accommodation-related services, including listings for student-friendly housing, roommate matching, and resources for navigating the rental process.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">How can I find suitable food-related services on your platform? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
              Our platform offers a variety of food-related services such as nearby restaurants, meal plans, and delivery options. You can explore and discover dining options that cater to your preferences and budget.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Are study-related services available on your platform? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
              Absolutely! We offer resources for academic support, study materials, and information on courses. We have also included faculty rating for your convenience. Our goal is to make your academic journey smoother and more successful.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">How can I list my services on your platform? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
              To list your services, simply sign up as a provider and follow the easy steps to create your listing. Make sure to provide detailed information and high-quality images for better visibility.

              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Is it free to use your platform? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
              Yes, our platform is free for students to use. However, there may be fees associated with listing services or accommodations for providers. Check our terms and conditions for more details.

              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq7" class="collapsed">How can I contact customer support if I have any issues or questions? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq7" class="collapse" data-bs-parent=".faq-list">
              <p>
              If you have any questions or encounter issues, feel free to reach out to our dedicated customer support team through the contact form on our website. We're always here to assist you.

              </p>
            </div>
          </li>

        </ul>

      </div>
    </section>
    <!-- End Frequenty Asked Questions Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
        </div>

        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-5 mb-5 mb-md-0">
            <div class="info">
              <div class="address">
                <i class="bx bx-map"></i>
                <p>MADANI AVE<br>Dhaka, BANGLADESH</p>
              </div>

              <div class="email">
                <i class="bx bx-envelope"></i>
                <p>info@UIUPeers.com</p>
              </div>

              <div class="phone">
                <i class="bx bx-phone-call"></i>
                <p>+880 1XXXXXXX</p>
              </div>
            </div>

            <!-- <div class="social-links">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> -->

          </div>

          <!-- <div class="col-lg-5 col-md-7">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div> -->

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>UIUPeers</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-landing-page/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer>
  <!-- End #footer -->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>