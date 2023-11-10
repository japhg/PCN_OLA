<?php
session_start();
include '../database/connection.php';
include '../body/function.php';

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $file = $_FILES['file'];
  $fileName = $_FILES['file']['name'];
  $fileTempName = $_FILES["file"]["tmp_name"];
  $fileSize = $_FILES["file"]["size"];
  $fileError = $_FILES["file"]["error"];
  $fileType = $_FILES["file"]["type"];
  $folder = "../imageStorage/" . $fileName;

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = $folder;
        move_uploaded_file($fileTempName, $fileDestination);

        if (!empty($file)) {
          $query = "UPDATE employer_tbl SET e_profile = '$fileName' WHERE email_address = '" . $_SESSION['email'] . "'";

          $result = mysqli_query($con, $query);

          header("location: employer_profile.php");
        } else {
          $_SESSION['errorMessage'] = "Failed to update profile picture";
        }
      } else {
        $_SESSION['errorMessage'] = "You image is too big!";
      }
    } else {
      $_SESSION['errorMessage'] = " There was an error uplading your file!";
    }
  } else {
    $_SESSION['errorMessage'] = "You cannot upload this type of Image";
  }
}


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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
    <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="jquery-2.1.3.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <!-- <link rel="stylesheet" href="css/style/search_job.css"> -->
    <link rel="stylesheet" href="../css/style/header.css">
    <link rel="stylesheet" href="../css/bootstrap.css">


    <title>Profile</title>
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


      .img-circle {
        flex: none;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        backdrop-filter: blurd(10px) !important;
        box-shadow: 5px 10px 20px rgba(0, 0, 0, .3) !important;
      }

      #profilebtn {
        background: #6559ca !important;
        color: #fff !important;
        box-shadow: none !important;
      }

      .info ul li {
        list-style: none;
        text-align: justify;
        display: block;
        padding-right: 5rem;
        font-size: 18px;
      }

      table tr td {
        border-bottom: 1px solid black;
      }

      /* For Smart Phone View */
      @media screen and (max-width: 768px) {
        .info ul {
          text-align: left;
          margin-top: 1rem;
        }

        .info ul li {
          text-align: left;
        }
      }


      /* For Tablet View */

      @media screen and (min-width: 769px) and (max-width: 1023px) {
        .info ul {
          text-align: left;
        }

        .info ul li {
          display: inline-block;
        }
      }
    </style>
  </head>

  <body>
    <?php
    include '../body/loader.php';
    include '../body/employer_header.php'; ?>

    <!--Modal-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <br>
            <h5 style="color: #000; font-family: 'Roboto', sans-serif; font-weight: 800; text-align: center;">UPDATE YOUR PROFILE PICTURE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background: none !important;"></button>
          </div>
          <div class="modal-body">
            <!-- Form -->

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
              <div class="col-auto">
                <label for="email" class="form-label" style="color: #000;">Please select image</label>
                <input type="file" class="form-control" name="file" id="file" style="color: #000; box-shadow: none; border-color: #6559ca;" required>
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>
              <button type="submit" name="update" class="btn" style="background: #6559ca; color: #fff; border: none;">Update</button>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #121212 !important;">Close</button>
          </div>
        </div>
      </div>
    </div>


    <br><br><br><br><br><br><br><br>
    <main>
      <div class="container mt-12">
        <div class="pagetitle">
          <h1 style="color: #6559ca; font-weight: 800;">MY PROFILE</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </nav>
        </div>
        <!-- End Page Title -->

        <!-- Start of Section Page -->
        <section>
          <div class="container">
            <?php
            $query = "SELECT e_profile FROM employer_tbl WHERE email_address = '" . $_SESSION['email'] . "'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result)) {
              $row = mysqli_fetch_assoc($result);
              $image = $row['e_profile'];

            ?>
              <center>
                <img alt="Profile Picture" class="img-circle" <?php echo '<img src="../imageStorage/' . $image . '" />'; ?> <br><br>
                <button type="button" class="btn" id="profilebtn" style="background: #6559ca; color: #fff; border: none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update Picture</button>
              </center>
            <?php } ?>
            <div class="info">
              <ul>
                <br><br><br>
                <?php
                $query = "SELECT *FROM employer_tbl WHERE email_address ='" . $_SESSION['email'] . "'";
                if ($result = mysqli_query($con, $query)) {

                  $row = mysqli_fetch_assoc($result);
                ?>

                  <span>
                    <h3>PERSONAL INFORMATION</h3>
                  </span>
                  <li>&nbsp;&nbsp;<strong>Name:</strong> <?php echo $row['lastname'], ", ", $row['firstname'], " ", $row['middlename']; ?></li>
                  <li>&nbsp;&nbsp;<strong>Email Address:</strong> <?php echo $row['email_address']; ?></li>
                  <li>&nbsp;&nbsp;<strong>Contact Number:</strong> <?php echo $row['contact_number']; ?></li>
              </ul>
              <ul>
                <br><br>
                <span>
                  <h3>COMPANY INFORMATION</h3>
                </span>
                <li>&nbsp;&nbsp;<Strong>Company Name:</Strong> <?php echo $row['companyName']; ?></li>
                <li>&nbsp;&nbsp;<strong>Company Address:</strong> <?php echo $row['street'], " ", $row['barangay'], ", ", $row['city'], ", ", $row['state']; ?></li>
              </ul>
            </div>
          <?php } ?>
          </div>
        </section>


    </main>




    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <?php include '../body/footer.php'; ?>
  </body>

  </html>
<?php
} else {
  header("location:index.php");
  session_destroy();
}
unset($_SESSION['prompt']);
mysqli_close($con);
?>