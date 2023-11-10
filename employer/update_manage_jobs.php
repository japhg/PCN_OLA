<?php
include '../database/connection.php';
include '../body/function.php';
session_start();
$errors = array();

//UPDATE USER
if (isset($_POST['edit'])) {
    $id = clean($_POST['id']);
    $title = clean(mysqli_real_escape_string($con, $_POST['title']));
    $type = clean(mysqli_real_escape_string($con, $_POST['type']));
    $skills = clean(mysqli_real_escape_string($con, $_POST['skills']));
    $salary = clean(mysqli_real_escape_string($con, $_POST['salary']));
    $years = clean(mysqli_real_escape_string($con, $_POST['years']));
    $benefits = clean(mysqli_real_escape_string($con, $_POST['benefits']));
    $jobDescription = clean(mysqli_real_escape_string($con, $_POST['jobDescription']));

    if (!empty($title) && !empty($type) && !empty($skills) && !empty($years) && !empty($salary) && !empty($benefits) && !empty($jobDescription)) {
        $query = "UPDATE job_tbl SET title = '$title', type = '$type', skills = '$skills', years = '$years', salary = '$salary', benefits = '$benefits', jobDescription = '$jobDescription' WHERE job_id = '$id'";

        if ($result = mysqli_query($con, $query)) {
            $_SESSION['success'] = "Successfully Updated";
            header("location: manage_jobs.php");
        } else {
            echo '<script>
    swal({
      title: "Update unsuccessfully!",
      text: "Update unsucessfully",
      icon: "error",
    });</script>';
        }
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
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">


        <!-- JS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>



        <link rel="stylesheet" href="../css/style/header.css">
        <link rel="stylesheet" href="../css/bootstrap.css">


        <title>Update Jobs</title>
<style>
    *{
        font-family: 'Roboto', sans-serif;
    }
</style>
    </head>

    <body>
        <?php 
        include '../body/loader.php';
        include '../body/employer_header.php';
        ?>


       
        <br><br><br><br><br><br><br><br>
        <main>
            <?php
            if (count($errors) > 0) { ?>
                <?php
                foreach ($errors as $showerror) {
                ?>
                    <script>
                        swal({
                            title: "<?php echo $showerror ?>",
                            icon: "success",
                            button: "OK"
                        })
                    </script>
                <?php
                }

                ?>
            <?php
            }
            ?>
            <div class="container">
                <div class="pagetitle">
                    <h1 style="color: #6559ca; font-weight: 800;">MANAGE JOBS</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="manage_jobs.php">Manage Jobs</a></li>
                            <li class="breadcrumb-item active">Update Manage Jobs</li>
                        </ol>
                    </nav>
                </div>
                <!-- End Page Title -->
                <br><br><br>
                <section>
                    <div class="container">
                        <?php
                        if (isset($_POST['updates'])) {
                            $id = $_POST['updates'];
                            $query = "SELECT * FROM job_tbl WHERE job_id = '$id'";
                            $result = mysqli_query($con, $query);

                            foreach ($result as $row) {
                        ?>
                                <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <input type="hidden" name="id" value="<?php echo $row['job_id']; ?>">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title']; ?>" required>
                                        <div class="invalid-feedback">Please enter job title</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Job Type</label>
                                        <select name="type" id="type" class="form-select" required>
                                            <option selected disabled value="">Select</option>
                                            <option value="FULL TIME">FULL TIME</option>
                                            <option value="PART TIME">PART TIME</option>
                                            <option value="CONTRACT">CONTRACT</option>
                                            <option value="INTERNSHIP">INTERNSHIP</option>
                                        </select>
                                        <div class="invalid-feedback">Please enter job type</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="years" class="form-label">Years of Experience</label>
                                        <input type="text" class="form-control" name="years" id="years" value="<?php echo $row['years']; ?>" required>
                                        <div class="invalid-feedback">Please enter Years of Experience</div>
                                    </div>
                                    <div class="mb-3">
                                        <span id="left"><br>Skills</span>
                                        <textarea name="skills" id="textArea" class="form-control" cols="30" rows="10" required><?php echo $row['benefits']; ?></textarea>
                                        <div class="invalid-feedback">
                                            Please input Skills.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $row['salary']; ?>" required>
                                        <div class="invalid-feedback">Please enter Salary</div>
                                    </div>
                                    <div class="mb-3">
                                        <span id="left"><br>Benefits</span>
                                        <textarea name="benefits" id="textArea" class="form-control" cols="30" rows="10" required><?php echo $row['benefits']; ?></textarea>
                                        <div class="invalid-feedback">
                                            Please input Benefits.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <span id="left"><br>Job Description</span>
                                        <textarea name="jobDescription" id="textArea" class="form-control" cols="30" rows="10" required><?php echo $row['benefits']; ?></textarea>
                                        <div class="invalid-feedback">
                                            Please input Job Description.
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" onclick="window.history.back()" style="box-shadow: none;">Cancel</button> <br>
                                        <button type="submit" class="btn btn-outline-success" name="edit" id="edit">Update</button>
                                    </div>
                                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </section>



                <!-- Start of Section Page -->



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