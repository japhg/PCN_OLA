<!DOCTYPE html>
<html lang="en-us">

<head>
  <!-- Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="alegario cure, alegario, Job Portal, JOB PORTAL, SEARCH JOB PORTAL, ALEGARIO CURE HOSPITAL JOB PORTAL">
  <meta name="description" content="Start your Journey here. Find a Job that is suitable to you. <br> We offer a variety of job opportunities for job seekers of all experience levels.">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="UTF-8">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/alegario_logo.png" type="image/x-icon">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
  <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
  <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow+Condensed:wght@400;600&family=Comfortaa:wght@500&family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Hind&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

  <!-- Script -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="css/style/style.css">
  <link rel="stylesheet" href="css/style/header.css">
  <link rel="stylesheet" href="css/bootstrap.css">

  <title>Job Portal</title>
</head>

<body id="home">
  <?php include 'body/loader.php';
   ?>

   <nav class="top-nav">
   <div class="nav">
      <div class="d-flex justify-content-start" id="logo" style="width: 100%;">
      <a href="index.php" class="logo d-flex align-items-center w-auto">
        <img src="assets/img/alegario_logo.png" alt="HR Logo" width="20%">
        <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">ALEGARIO<b id="animated-text" style="font-family: 'Poiret One', cursive !important;"> CURE</b></span>
      </a>
    </div>

    <div class=".menu-page d-flex justify-content-center py-4" style="width: 100%;">
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
    </label>


    <ul class="menu">
    <li><button class="btn"><a class="active" href="#home">HOME</a></button></li>
      <li><button class="btn"><a href="#about">ABOUT</a></button></li>
      <li><button class="btn"><a href="#contact">CONTACT</a></button></li>
      <li><button class="btn"><a href="applicant/register_applicant.php">SIGNUP</a></button></li>
      <li><button class="btn" id="login"><a href="applicant/login_applicant.php">LOGIN</a></button></li>
    </ul>
    </div>
    <div class="d-flex justify-content-end py-4" id="icons" style="width: 100%;">
        <div class="icons">
      <a href="#" class="fa fa-facebook-square"></a>
      <a href="#" class="fa fa-instagram"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-google"></a>
      </div>
      </div>
    </div>
  </nav>

  

  <section>
    <div class="homepages">
      <div class="home">

        <div class="text">
          <h1>Build your <br> Bright future <br> right now</h1><br>
          <h6>Start your journey here. Find a job that is suitable to you. <br> We offer a variety of job opportunities for job seekers of all experience levels.</h6>
          <br><br>

          <ul>
            <li>
              <a href="job/search_job.php" id="home-button">Find Jobs Now</a>
            </li>
          </ul>
          

        </div>

        <div class="home-image">
          <div class="row justify-content-end" style="width: 100vh;"></div>
          <img src="img/Marketing consulting-cuate.svg" width="40%" class="rounded" alt="..." id="img">
        </div>

      </div>
    </div>



    <!-- About Us -->
    <div class="nextPage" id="about">
      <div class="about-page">

        <div class="about" style="background-image: linear-gradient(to right, #fff, #fff, #fff) !important; background-size: cover; height: 100vh">
          <div class="row justify-content-start" style="width: 100vh;"></div>
          <img src="img/Gut health-cuate.svg" width="90%" class="rounded" alt="..." id="img2">
        </div>

        <div class="description">
          <h3>Who Are We?</h3>
          <h1>About Us</h1>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta vel eligendi pariatur esse voluptatum, corporis dolorem aliquam commodi recusandae vitae fuga quaerat necessitatibus corrupti exercitationem, quae quasi laboriosam! Iure, necessitatibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Nostrum, fugiat sed perferendis aliquid dolore animi fugit dolores nihil vel, maxime totam reprehenderit incidunt sint! Adipisci natus beatae sint quasi ipsam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit neque deserunt similique consequatur explicabo modi totam impedit ea pariatur. Doloribus repudiandae laborum illo beatae aliquid eveniet recusandae fuga natus vitae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi praesentium iure quam harum ad itaque iste odit, reiciendis voluptatum eveniet, rerum explicabo consectetur temporibus possimus libero aliquid in quas sequi?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia dolore quaerat excepturi qui sequi optio, eum sunt placeat enim voluptate nobis asperiores nostrum deleniti quibusdam accusamus neque aliquam esse rerum? </p>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique minima error iure excepturi commodi! Dolorem voluptates nostrum corrupti voluptas impedit debitis reprehenderit magnam distinctio accusamus. Deserunt dolor officia voluptatem iste? Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni exercitationem, impedit quaerat repellat sint vel voluptates mollitia alias perspiciatis id tenetur? Minima amet tempora sed, consequatur obcaecati corrupti deleniti <cumque class="lorem"></cumque>
          </p>
          <br>
          <button type="button" id="button" onclick="location.href = 'body/about.php';">View More</button>
        </div>

      </div>
    </div>


    <!-- Contact Us -->
    <div class="contact-page" id="contact">.
      <div class="contact-body">

        <div class="contact_info">
          <h3>Contact Us</h3>
          <h1>Get In Touch</h1><br><br>
          <div class="icons" id="icons2">
            <ul class="elementor-icon-list-items">
              <li class="elementor-icon-list-item">
                <span class="elementor-icon-list-icon">
                  <i class="fa-sharp fa-solid fa-location-dot"></i>
                </span>
                <span class="elementor-icon-list-text">
                  <p>1071 Brgy. Kaligayahan <br>
                    Quirino Highway, Novaliches, Quezon City <br>
                    Metro Manila, Philippines</p>
                </span>
              </li>
              <li class="elementor-icon-list-item">
                <span class="elementor-icon-list-icon">
                  <i class="fa-solid fa-phone"></i>
                </span>
                <span class="elementor-icon-list-text">
                  <br>
                  <p>1234-5678 <br>1122-3344</p>
                </span>
              </li>
              <li class="elementor-icon-list-item">
                <span class="elementor-icon-list-icon">
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <span class="elementor-icon-list-text">
                  <br>
                  <p>DummyEmail@gmail.com</p>
                </span>
              </li>
          </div>
        </div>

        <div class="contact-image" style="background-image: linear-gradient(to right, #fff, #fff, #fff) !important; background-size: cover; height: 100vh">
          <div class="row justify-content-end" style="width: 100vh;"></div>
          <img src="img/Public health-amico.svg" width="50%" class="rounded" alt="..." id="img3">
        </div>

      </div>
    </div>

  </section>
  





  <footer class="footer" id="footer" style="background: #121212;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2" id="footer_links">
          <div class="d-flex justify-content-start py-4" id="logo">
            <a href="index.php" class="logo d-flex align-items-center w-auto">
              <img src="assets/img/alegario_logo.png" alt="HR Logo" width="28%">
              <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #fff !important; font-weight: 500;">ALEGARIO<b id="animated-text"> CURE</b></span>
            </a>
          </div>
        </div>

        <div class="col-sm-3 col-md-2" id="footer_links">
          <ul>
            <span>JOB SEEKERS</span>
            <li>
              <a href="job/search_job.php">Search Jobs</a>
            </li>
            <li>
              <a href="applicant/login_applicant.php">Job Seeker Login</a>
            </li>
            <li>
              <a href="applicant/register_applicant.php">Job Seeker Register</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-2" id="footer_links">
          <ul>
            <span>ABOUT US</span>
            <li>
              <a href="">About Us</a>
            </li>
            <li>
              <a href="">FAQ</a>
            </li>
            <li>
              <a href="">Contact Us</a>
            </li>
            <li>
              <a href="">Terms & Conditions</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-2" id="footer_links">
          <ul>
            <span>ADDRESS</span>
            <li>
              1071 Brgy. Kaligayahan <br>
              Quirino Highway, Novaliches, Quezon City <br>
              Metro Manila, Philippines
            </li>
          </ul>
        </div>
        <div class="col-sm-3 col-md-2" id="footer_links">
          <ul>
            <span>SOCIAL MEDIA</span>
            <p style="color: #fff !important;">Follow us</p>

            <a href="#" target="_blank" class="fa fa-facebook-square" style="color: #fff !important;"></a>
            <a href="#" target="_blank" class="fa fa-instagram" style="color: #fff !important;"></a>
            <a href="#" target="_blank" class="fa fa-twitter" style="color: #fff !important;"></a>
            <a href="mailto:DummyEmail@gmail.com" target="_blank" class="fa fa-google" style="color: #fff !important;"></a>
          </ul>
        </div>

      </div>
    </div>
    <br><br>
    <div class="footer_credit small mb-0" style="text-align: center; background: #131313 !important;">
      <p style="color: #ADADAD !important;">Copyright &copy; 2023. All rights Reserved. <br>Developed by <a href="https://www.facebook.com/Jpgomera19/" target="_blank" style="color: #fff !important;">James Philip Gomera</a></p>
    </div>
  </footer>
  <script src="js/bootstrap.js"></script>
  <script>
    $(window).scroll(function() {
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    });
  </script>
</body>

</html>