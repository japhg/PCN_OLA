<?php
session_start();
include "../database/connection.php";
include "../body/function.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = clean(mysqli_real_escape_string($con, $_POST['email']));
  $password = clean(mysqli_real_escape_string($con, $_POST['password']));

  $query = "SELECT * FROM applicant_tbl WHERE email_address = '$email'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email_address'];
    $_SESSION['password'] = $row['password'];
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
      echo "success";
    } else {
      echo "Invalid Email or Password";
    }
  }
}
?>


<!--DELETE USER-->
<?php

  if(isset($_POST['delete_btn_set'])){
    $id = $_POST['delete_id'];
    
    $query = "DELETE FROM job_tbl WHERE job_id = '$id'";
    $result = mysqli_query($con, $query);
    
    $_SESSION['success'] = "Job is succesfully deleted!";
    header("location: manage_jobs.php");
  }
?>

<!--CLOSE JOBS -->
<?php

  if(isset($_POST['close_btn_set'])){
    $id = $_POST['close_id'];
    $status = "CLOSED";
    
    $query = "UPDATE job_tbl SET status = '$status' WHERE job_id = '$id'";
    $result = mysqli_query($con, $query);
    
    $_SESSION['success'] = "Job is succesfully closed!";
    header("location: manage_jobs.php");
  }
?>

<!-- OPEN JOBS -->
<?php

  if(isset($_POST['open_btn_set'])){
    $id = $_POST['open_id'];
    $status = "ACTIVE";
    
    $query = "UPDATE job_tbl SET status = '$status' WHERE job_id = '$id'";
    $result = mysqli_query($con, $query);
    
    $_SESSION['success'] = "Job is succesfully open!";
    header("location: manage_jobs.php");
  }
?>

