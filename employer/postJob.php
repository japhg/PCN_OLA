<?php
session_start();
include "../database/connection.php";
include "../body/function.php";

if (isset($_POST['post'])) {
  $id = $_POST['id'];
  $title = clean(mysqli_real_escape_string($con, $_POST['title']));
  $type = clean(mysqli_real_escape_string($con, $_POST['jobtype']));
  $years = clean(mysqli_real_escape_string($con, $_POST['years']));
  $skills = clean(mysqli_real_escape_string($con, $_POST['skills']));
  $salary = clean(mysqli_real_escape_string($con, $_POST['salary']));
  $benefits = clean(mysqli_real_escape_string($con, $_POST['benefits']));
  $jobDescription = clean(mysqli_real_escape_string($con, $_POST['jobDescription']));
  $status = "ACTIVE";



  if (!empty($title) && !empty($type) && !empty($years) && !empty($skills) && !empty($salary) && !empty($benefits) && !empty($jobDescription)) {
    $query = "INSERT INTO job_tbl(empr_id, title, type, years, skills, salary, benefits, jobDescription, status) VALUES('$id','$title','$type','$years','$skills','$salary','$benefits','$jobDescription','$status')";

    $result = mysqli_query($con, $query);

    header("location: dashboard.php");
  } else {
    $_SESSION['errorMessage'] = "Failed to post the job";
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
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style/search_results.css">
    <link rel="stylesheet" href="../css/style/header.css">
    <link rel="stylesheet" href="../css/bootstrap.css">


    <title>Post Job</title>

  </head>

  <body>
    <?php 
    include '../body/loader.php'; 
    include '../body/employer_header.php';
    ?>
    
    <br><br><br><br><br><br><br><br>
    <div class="main">
      <?php
      if (isset($_SESSION['errorMessage'])) { ?>
        <script>
          swal({
            title: "<?php echo $_SESSION['errorMessage']; ?>",
            icon: "error",
            button: "Retry"
          })
        </script>
      <?php unset($_SESSION['errorMessage']);
      } ?>
      <div class="container mt-6">
        <div class="pagetitle">
          <h1 style="color: #6559ca; font-weight: 800;">POST JOB VACANCIES</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php" style="color: #000;">Home</a></li>
              <li class="breadcrumb-item active">Post Job</li>
            </ol>
          </nav>
        </div>
        <!-- End Page Title -->

      </div>
    </div>



    <section>
      <div class="container" id="body">
        <br><br><br>
        <span>
          <h4>JOB DETAILS</h4>
        </span>
        <?php
        $query = "SELECT id FROM employer_tbl WHERE email_address = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result)) {
          $row = mysqli_fetch_assoc($result);

        ?>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group needs-validation" novalidate enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
            <div class="form-floating col-sm-12 col-md-12 col-lg-7">
              <input type="text" class="form-control" id="title" name="title" placeholder="Job Title" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #6559ca !important;" required>
              <label for="title" style="color: #000">Job Title</label>
              <div class="invalid-feedback">
                Please input Job Title.
              </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-7">
              <br>
              <label for="jobtype" style="color: #000">Job Type</label>
              <select name="jobtype" id="jobtype" class="form-select" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #6559ca !important;" required>
                <option selected disabled value="">Select</option>
                <option value="FULL TIME">FULL TIME</option>
                <option value="PART TIME">PART TIME</option>
                <option value="CONTRACT">CONTRACT</option>
                <option value="INTERNSHIP">INTERNSHIP</option>
              </select>
              <div class="invalid-feedback">
                Please input Job Type.
              </div>
            </div>

            <div class="form-floating col-sm-12 col-md-12 col-lg-7">
              <input type="text" class="form-control" id="years" name="years" placeholder="Years of Experience" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #6559ca !important;" required>
              <label for="years" style="color: #000">Years of Experience</label>
              <div class="invalid-feedback">
                Please input Years of Experience.
              </div>
            </div>

            <div class=" col-md-12 col-lg-7">
              <span id="left"><br>Skills</span>
              <textarea name="skills" id="skills" class="form-control" cols="30" rows="10" style="box-shadow: none; border: 1px solid #6559ca;" required></textarea>
              <div class="invalid-feedback">
                Please input Skills.
              </div>
            </div>

            <div class="form-floating col-sm-12 col-md-12 col-lg-7">
              <input type="text" class="form-control" id="salary" name="salary" placeholder="Salary" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #6559ca !important;" required>
              <label for="salary" style="color: #000">Salary</label>
              <div class="invalid-feedback">
                Please input Salary.
              </div>
            </div>

            <div class="form-floating col-sm-12 col-md-12 col-lg-7">
              <input type="text" class="form-control" id="benefits" name="benefits" placeholder="Benefits" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #6559ca !important;" required>
              <label for="benefits" style="color: #000">Benefits</label>
              <div class="invalid-feedback">
                Please input Benefits
              </div>
            </div>

            <div class=" col-md-12 col-lg-7">
              <span id="left"><br>Job Description</span>
              <textarea name="jobDescription" id="jobDescription" class="form-control" cols="30" rows="10" style="box-shadow: none; border: 1px solid #6559ca;" required></textarea>
              <div class="invalid-feedback">
                Please input Job Description.
              </div>
            </div>

            <div class=" col-md-12 col-lg-7">
              <br>
              <button type="submit" name="post" id="post" class="btn" style="background-color: #6559ca; color: #fff; box-shadow: none">Post</button>
            </div>
            <br><br><br><br><br><br><br><br>
          </form>
        <?php
        }
        ?>
      </div>
    </section>

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
  header("location:../index.php");
  session_destroy();
}
unset($_SESSION['prompt']);
mysqli_close($con);
?>