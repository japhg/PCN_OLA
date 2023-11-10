<?php
require "../database/connection.php";
require "../body/function.php";
session_start();

if (isset($_SESSION['email'], $_SESSION['password'])) {
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" integrity="sha512-qNOgON0B9KMz+UEI8JjlcEcBxtl28ULZIOwFZmBmCJfYBYidFzbC9PUDoN8gKjzpLNoQalNqbZwheNQww/u+Ew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-lZFHibZ8Oz5VUUXm93eI/lFpn8LyoYf7S9s/6+4hLWI33D6U0FvM/seqp6k4g4+q3BvN3X1TPI7aVT2WGe3i0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js" integrity="sha512-OOv0Yy9FChEoNhOcpntG8Qv42+bCZohE2ge/QwSZ+0FpkRbO9y5Ozg98xMkq3zr5MfaC/5JQ1w+dn/YkNtXCHg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="stylesheet" href="../css/style/search_results.css">
    <link rel="stylesheet" href="../css/style/status.css">
    <link rel="stylesheet" href="../css/style/header.css">
    <link rel="stylesheet" href="../css/bootstrap.css">



    <title>Examination</title>

    <style>
      @font-face {
        font-family: 'Jamesphilip Bold';
        src: url(../assets/fonts/Fonts/sofiapro-light.otf);
      }
    </style>
  </head>

  <body>
    <?php include '../body/loader.php';
    include 'page/header.php';
    ?>

    <br><br><br><br><br><br><br><br>

    <div class="header">
      <div class="container">
        <h1 style="font-family: 'Jamesphilip Bold', sans-serif; color: #2fada2; font-weight: 800;">EXAMINATION</h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../applicant/searchjob.php" style="color: #000;">Search Jobs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Take Examination</li>
          </ol>
        </nav>
        <br><br>
      </div>
    </div>

    <!-- SELECT applicant.*, job.*, resumes.*, exam.*, question.*, optionss.* FROM applicant_tbl applicant, job_tbl job, resume_tbl resumes, exam_tbl exam, question_tbl question, option_tbl optionss WHERE applicant.id = resumes.a_id AND job.job_id = resumes.j_id AND job.job_id = exam.job_id AND exam.id = question.exam_id AND question.id = optionss.question_id ORDER BY question.id, optionss.id; -->

    <div class="main">

      <?php
      $query = "SELECT applicant.*, job.*, resumes.*, exam.*, DATE_FORMAT(date_uploaded, '%M %d, %Y') as formatted_date 
          FROM hr1_applicant applicant, hr_job_list job, hr1_resume resumes, hr1_exam exam
          WHERE applicant.id = resumes.applicant_id 
          AND job.id = resumes.job_list_id 
          AND job.id = exam.job_list_id 
          AND email_address = '" . $_SESSION['email'] . "'";

      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          $status = $row['resume_status'];
          $exam_id = $row['id'];
          $applicant_id = $row['applicant_id'];
          $rows = mysqli_num_rows($result);
          if ($row['resume_status'] === "Examination Granted" || $row['resume_status'] === "Examination Passed" || $row['resume_status'] === "Examination Failed") {

            // Retrieve the exam ID and the applicant ID from the current row

            $select_query = "SELECT applicant.*, answer.*, COUNT(*) as count
        FROM hr1_applicant applicant, hr1_answer answer
        WHERE applicant.id = answer.applicant_id 
        AND exam_id = '$exam_id' AND applicant_id = '$applicant_id'
        AND email_address = '" . $_SESSION['email'] . "'";

            $select_result = mysqli_query($con, $select_query);
            $select_row = mysqli_fetch_assoc($select_result);


            $check_result = mysqli_query($con, $select_query);
            $check_row = mysqli_fetch_assoc($check_result);

            if ($check_row['count'] > 0) {
              // If the count is greater than zero, then the applicant has already taken the exam
      ?>
              <div class="card w-75 mb-3">
                <div class="card-body">
                  <?php
                  $query2 = "SELECT * 
                  FROM hr1_score 
                  WHERE exam_id = '$exam_id' AND applicant_id = '$applicant_id'";

                  $result2 = mysqli_query($con, $query2);
                  $row2 = mysqli_fetch_assoc($result2);
                  ?>
                  <h5 class="card-title" style="font-family: 'Jamesphilip Bold', sans-serif"><?php echo $row['exam_title']; ?></h5>
                  <p class="card-text">Your score: <?php echo $row2['score']; ?>/<?php echo $row['num_items']; ?></p>
                  <p class="card-text">Score Percentage: <?php echo $row2['score_percentage']; ?>%</p>
                  <input type="hidden" name="popupModal" class="popupModal" value="<?php echo $row['id']; ?>">
                  <button class="btn btn-sm takeExamBtn" style="background: #57d8cd; color: #fff;" disabled>Take Exam</button>
                </div>
              </div>

            <?php } else {
              // If the count is zero, then the applicant has not taken the exam yet
              // Proceed with displaying the exam information
            ?>
              <div class="card w-75 mb-3">
                <div class="card-body">
                  <h5 class="card-title" style="font-family: 'Jamesphilip Bold', sans-serif"><?php echo $row['exam_title']; ?></h5>
                  <?php
                  if ($row['exam_duration'] === "120") {
                    echo '<p class="card-text">Time limit: 2 hours</p>';
                  } elseif ($row['exam_duration'] === "60") {
                    echo '<p class="card-text">Time limit: 1 hour</p>';
                  } elseif ($row['exam_duration'] === "30") {
                    echo '<p class="card-text">Time limit: 30 minutes</p>';
                  } elseif ($row['exam_duration'] === "10") {
                    echo '<p class="card-text">Time limit: 10 minutes</p>';
                  } elseif ($row['exam_duration'] === "5") {
                    echo '<p class="card-text">Time limit: 5 minutes</p>';
                  }
                  ?>
                  <p class="card-text">Number of questions: <?php echo $row['num_items']; ?> items</p>
                  <input type="hidden" name="popupModal" class="popupModal" value="<?php echo $row['id']; ?>">
                  <button class="btn btn-sm takeExamBtn" style="background: #57d8cd; color: #fff;">Take Exam</button>
                </div>
              </div>
      <?php
            }
          }
        }
      }
      ?>


      <div class="modal fade" id="take-exam" tabindex="-1" aria-labelledby="take-exam-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="take-exam-label">Take Examination</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php ?>
            <div class="modal-body">
              <p>Exam details:</p>
              <p>Unique ID: <?php echo $row['id']; ?></p>

            </div>
            <?php ?>
          </div>
        </div>
      </div>

    </div>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include '../body/footer.php'; ?>



    <script>
      var newWin;

      function openPopup() {
        newWin = window.open('take_examination.php', 'Take Examination', 'width=5000, height=1000');

        document.onmousedown = focusPopup;
        document.onkeyup = focusPopup;
        document.onmousemove = focusPopup;

      }

      function focusPopup() {
        if (!newWin.closed) {
          newWin.focus();
        }
      }
    </script>
    
     <script>
      var childWindow = null;

      function openChildWindow(url) {
        childWindow = window.open(url);
      }

      window.onbeforeunload = function() {
        if (childWindow && childWindow.closed) {
          location.reload();
        }
      }
    </script>


    <script>
      $(document).ready(function() {
        $('.card-body').on('click', '.takeExamBtn', function() {
          var examId = $(this).prev('.popupModal').val();
          $('#take-exam').modal('show');

          // load the corresponding question(s) for the clicked row
          $.ajax({
            url: 'get_data.php',
            type: 'post',
            data: {
              exam_id: examId
            },
            success: function(response) {
              $('#take-exam .modal-body').html(response);
            },
            error: function() {
              alert('Error loading questions.');
            }
          });
        });
      });
    </script>


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