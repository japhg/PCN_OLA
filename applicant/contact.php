<?php
include '../database/connection.php';
include '../body/function.php';
session_start();


if (isset($_SESSION['email'], $_SESSION['password'])) {
?>
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
    <link rel="shortcut icon" href="../img/hrlogo.png" type="image/x-icon">

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
    <link rel="stylesheet" href="../css/style/style.css">
    <link rel="stylesheet" href="../css/style/header.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <title>Contact Us | Job Portal</title>

    <style>
        .text p {
            text-align: justify !important;
        }

        @media screen and (min-width: 769px) and (max-width: 1668px) {
            .text p {
                font-size: 14px;
                margin: 1rem 5rem;
            }
        }

        @media screen and (max-width: 768px) {
            .text p {
                font-size: 12px;
                margin: 1rem 5rem;
            }
        }
    </style>
</head>

<body id="contact">
    <?php include '../body/loader.php';
    include 'page/header.php';
    ?>


    <div class="contact-homepages">
        <div class="contact-home">

            <div class="contact-text">
                <h1>Contact Us</h1>
                <h3>Get In Touch</h3><br><br>
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

            <div class="contact-form">
                    <h2>Contact Form</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-lg-12">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" style="box-shadow: none !important; outline: none !important;" required>
                        <div class="invalid-feedback">
                            Please enter your Name.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Please enter your Email Address.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="number" name="number" class="form-control" id="number" placeholder="Phone Number" required>
                        <div class="invalid-feedback">
                            Please enter your Phone Number.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="message" class="form-control" id="message" placeholder="Message" required>
                        <div class="invalid-feedback">
                            Please enter your Message.
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn" name="submit" id="submit" style="box-shadow: none !important;">Submit</button>
                    </div>

                </form>
            </div>

        </div>
        <br><br><br><br><br><br><br><br><br><br><br>
        <?php include '../body/footer.php'; ?>
        </div>

    </div>


    <footer>

    </footer>
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../ssets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <script src="../js/bootstrap.js"></script>
    <script>
        $(window).scroll(function() {
            $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
        });
    </script>
</body>

</html>
<?php
} else {
  header("location:../applicant/login_applicant.php");
  session_destroy();
}
unset($_SESSION['prompt']);
mysqli_close($con);
?>