<?php
include "../database/connection.php";
include "../body/function.php";
session_start();
$errors = array();

if (isset($_POST['apply'])) {
  $job_id = $_POST['job_id'];
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo "Hello";
  } else {
    header("location: ../applicant/JobApply_Login.php?job_id=$job_id");
    $_SESSION['werror'] = "It seems that you are not already login. You must log in first before applying for the job!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/alegario_logo.png" type="image/x-icon">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
  <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
  <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Main Quill library -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

  <!-- JS -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


  <link rel="stylesheet" href="../css/style/search_results.css">
  <link rel="stylesheet" href="../css/style/header.css">
  <link rel="stylesheet" href="../css/bootstrap.css">



  <title>Job Details</title>

</head>

<body>
  <?php include '../body/loader.php';
  include '../body/header.php'; ?>

  <br><br><br><br><br><br><br><br>

  <div class="head">
    <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php" style="color: #000;">Home</a></li>
          <li class="breadcrumb-item"><a href="search_job.php" style="color: #000;">Search Jobs</a></li>
          <li class="breadcrumb-item active" aria-current="page">Job Details</li>
        </ol>
      </nav>
      <br><br>
    </div>
  </div>


  <div class="body">
    <div class="container">
      <?php

      $id = $_GET['jobid'];
      $query = "SELECT *, DATE_FORMAT(date_posted, '%M %d, %Y')as formatted_date FROM hr_job_list WHERE id = '$id'";
      if ($result = mysqli_query($con, $query)) {

        $row = mysqli_fetch_assoc($result);
        $_SESSION['job_details'] = $row;
        $image = $row['logo'];




        $query = "SELECT job_request.*, qualifications.*, job_list.*
        FROM hr_job_request job_request, hr1_job_qualifications qualifications, hr_job_list job_list
        WHERE qualifications.job_request_id = job_request.id
        AND job_list.job_request_id = job_request.id
        AND job_list.id = '$id'";

        $results = mysqli_query($con, $query);
        $rows = mysqli_fetch_assoc($results);
  
        $job_qualification = $rows['description'] ?? 'default value';
        

        $html = '';
        if (!empty($job_qualification)) {
          $data = json_decode($job_qualification, true);
          if (!empty($data['ops'])) {
            $html = '<ul>';
            foreach ($data['ops'] as $op) {
              if (!empty($op['insert'])) {
                $text = trim($op['insert']);
                $attributes = $op['attributes'] ?? null;
                if (!empty($attributes) && !empty($attributes['list']) && $attributes['list'] == 'bullet' && !empty($text)) {
                  $html .= '<li>' . $text . '</li>';
                } elseif (!empty($text)) {
                  $html .= '<li>' . $text . '</li>';
                }
              }
            }
            $html .= '</ul>';
          }
        }

      ?>
        <img alt="" class="img-thumbnail" width="100vw" <?php echo '<img src="../imageStorage/' . $image . '" />'; ?> <br><br>
        <h1  style="text-transform: uppercase; font-size: 22px;"> <?php echo $row['job_title']; ?></h1>
        <h5 class="small mb-0"><span class="material-symbols-sharp" style="color: #1d8a81;">apartment</span> Alegario Cure Hospital - <?php echo $row['department_name']; ?> Department</h5>
        <h6 class="small mb-0"><span class="material-symbols-sharp" style="color: #1d8a81;">location_on</span> <?php echo $row['street'], ", ", $row['barangay'], ", ", $row['city'], ", ", $row['state']; ?></h6>
        <h6 class="small mb-0"><span class="material-symbols-sharp" style="color: #1d8a81;">calendar_month</span> <?php echo $row['formatted_date']; ?></h6>
        <br>
        <hr>
        <h5 class="small mb-0" style="font-weight: bold;">JOB DESCRIPTION</h5>
        <p class="small mb-0 col-lg-6" style="text-indent: 2rem; color: #000; text-align: justify;"><?php echo nl2br($row['job_description']); ?></p>
        <br><br>
        <h5 class="small mb-0" style="font-weight: bold;">JOB QUALIFICATIONS</h5>
        <?php echo $html;?>
        <br><br>
        <div class="block small mb-0">
          <h5 class="small mb-0" style="font-weight: bold;">SKILLS</h5>
          <p style="color: #000;"><?php echo $row['skills']; ?></p>
          <br><br>
          <h5 class="small mb-0" style="font-weight: bold;">YEARS OF EXPERIENCE</h5>
          <p style="color: #000;"> - <?php echo $row['years']; ?></p>
          <br>
          <h5 class="small mb-0" style="font-weight: bold;">SALARY</h5>
          <p style="color: #000;"> - <?php echo $row['monthly_salary']; ?></p>
          <br>
          <h5 class="small mb-0" style="font-weight: bold;">JOB TYPE</h5>
          <p style="color: #000;"><?php echo $row['job_type']; ?></p>
        </div>
        <br>
        <h5 class="small mb-0" style="font-weight: bold;">BENEFITS</h5>
        <ul class="small mb-0">
          <li style="color: #000;"><?php echo $row['benefits']; ?></li>
        </ul>
        <br>
        <hr>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <input type="hidden" name="job_id" value="<?php echo $row['id']; ?>">
          <button type="submit" name="apply" class="btn btn-primary" style="background: #57d8cd; color: #fff; border: none; box-shadow: none;">Apply Now</button>
        </form>

      <?php }


      ?>
    </div>
  </div>
  </div>
  </main>



  <br><br><br><br><br><br><br><br>
  <!-- Vendor JS Files -->
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


  <?php include '../body/footer.php'; ?>
</body>

</html>