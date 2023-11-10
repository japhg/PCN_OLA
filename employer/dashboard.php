<?php
session_start();
include '../database/connection.php';
include '../body/function.php';


if (isset($_SESSION['email'], $_SESSION['password'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="15; url=login_employer.php"> -->
    <link rel="shortcut icon" href="../img/hrlogo.png" type="image/x-icon">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,200" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
    <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="css/style/search_job.css"> -->
    <link rel="stylesheet" href="../css/style/header.css">
    <link rel="stylesheet" href="../css/bootstrap.css">


    <title>Dashboard</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif !important;
      }

      html,
      body {
        background-image: linear-gradient(to right, #fff, #fff, #fff);
        height: 100vh;
      }


      .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
      }

      .card {
        width: 100% !important;
        background: #ffff !important;
        margin-top: 2rem !important;
        justify-content: left;
        padding: 1rem;
        backdrop-filter: blurd(10px) !important;
        box-shadow: 5px 10px 20px rgba(0, 0, 0, .3) !important;
      }

      .card-title {
        font-size: 18px;
      }

      .card-title span {
        color: #000;
      }

      h5 {
        color: #6559ca !important;
      }

      .ps-3 h6 {
        font-size: 30px;

      }
    </style>
  </head>

  <body>
    <?php
    include '../body/loader.php';
    include '../body/employer_header.php'; ?>

    <br><br><br><br><br><br><br><br>
    <main>
      <div class="container mt-12">
        <div class="pagetitle">
          <h1 style="color: #6559ca; font-weight: 800;">DASHBOARD</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </nav>
        </div>
        <!-- End Page Title -->

        <div class="row mt-12">

          <div class="col-xxl-4 col-md-6">
            <div class="card info-card">

              <div class="card-body">
                <h5 class="card-title">POSTED <span>| JOBS</span></h5>

                <?php
                $query = "SELECT e.*, j.* FROM employer_tbl e, job_tbl j WHERE e.id = j.empr_id AND email_address = '" . $_SESSION['email'] . "'";
                if ($result = mysqli_query($con, $query)) {
                  $rows = mysqli_fetch_assoc($result);
                  $row = mysqli_num_rows($result);

                ?>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row; ?></h6>
                    </div>
                  </div>
              </div>
            <?php } ?>
            </div>
          </div><!-- End Sales Card -->

          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">CLOSED <span>| JOBS</span></h5>
                <?php
                $query = "SELECT e.email_address, j.status FROM employer_tbl e, job_tbl j WHERE e.id = j.empr_id AND email_address = '" . $_SESSION['email'] . "' AND status = 'CLOSED'";
                if ($result = mysqli_query($con, $query)) {
                  $rows = mysqli_fetch_assoc($result);
                  $row = mysqli_num_rows($result);

                ?>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                          echo $row;
                          ?></h6>
                    </div>
                  </div>
              </div>
            <?php } ?>
            </div>
          </div><!-- End Sales Card -->

          

        </div>
    </main>

   
    <?php include '../body/footer.php'; ?>
  </body>

  </html>
<?php
} else {
  header("location:../index.php");
  session_destroy();
}
unset($_SESSION['prompt']);
mysqli_close($con);
?>