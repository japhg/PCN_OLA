<?php
include "../database/connection.php";
include "../body/function.php";
session_start();

if(isset($_POST['login'])){
  $email = clean(mysqli_real_escape_string($con, $_POST['email']));
  $password = clean(mysqli_real_escape_string($con, $_POST['password']));

  $query = "SELECT * FROM employer_tbl WHERE email_address = '$email'";
    $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email_address'];
    $_SESSION['password'] = $row['password'];
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) 
    {
      if($row['verify_status'] == "1")
      {
        header("location: dashboard.php");
        exit(0);
      }
      else
      {
        $_SESSION['warningmessage'] = "Your email is not yet verified. Please check your email for verification!";
      }

    }
    else
    {
      $_SESSION['errorMessage'] = "Invalid Username or Password";
    }
  }

  else
  {
      $_SESSION['errorMessage'] = "Invalid Username or Password";
  }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/hrlogo.png" type="image/x-icon">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>
  
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="../css/style/login.css">
    <link rel="stylesheet" href="../css/style/loader.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    

    <title>Login - Employer</title>

</head>

<body>
  <?php include '../body/loader.php';?>
  <?php 
    if(isset($_SESSION['message'])){ ?>
      <script>
            Swal.fire({
            icon: 'success',
            title: "<?php echo $_SESSION['message'];?>",
            })
      </script>
  <?php unset($_SESSION['message']); }?>
  <?php 
    if(isset($_SESSION['warningmessage'])){ ?>
      <script>
            Swal.fire({
            icon: 'warning',
            title: "<?php echo $_SESSION['warningmessage'];?>",
            })
      </script>
  <?php unset($_SESSION['warningmessage']); }?>
  <?php 
    if(isset($_SESSION['errorMessage'])){ ?>
       <script>
            Swal.fire({
            icon: 'error',
            title: 'Engk...',
            text: "<?php echo $_SESSION['errorMessage'];?>",
          })
          </script>
  <?php unset($_SESSION['errorMessage']); }?>

    <main>
      <div class="row justify-content-start" id="row"></div>
        <img src="../img/Secure login-bro.svg" class="rounded" width="50%" alt="..." id="bg">
      </div>
      <div class="container">
  
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-end">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
                <div class="d-flex justify-content-center py-4" id="logo">
                  <a href="../index.php" class="logo d-flex align-items-center w-auto">
                    <img src="../img/hrlogo.png" alt="HR Logo" width="30%">
                    <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000; font-weight: 600;">JOB PORTAL</span>
                  </a>
                </div>
                <!-- End Logo -->
           
  
                <div class="card mb-3" style="border: none;">
  
                  <div class="card-body" id="card-body" style="background: #fff; color: white;">
                    <div class="pt-4 pb-2">
                      <h2 class="card-title text-center " style="color: #6559ca; font-family: 'Inter', sans-serif; font-weight: 900;">LOGIN TO YOUR ACCOUNT</h2>
                      <br>
                    </div>
  
                    <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                    <div class="form-floating mb-7">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" style="background-color: inherit; border: 1px solid black; border-top: none; border-left: none; border-right: none; box-shadow: none !important;" required>
                            <label for="floatingInput" style="color: #000">Email Address</label>
                            <div class="invalid-feedback">
                              Please enter a Email Address.
                            </div>
                        </div>
 
                      <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" style="border: 1px solid black; background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important;" required>
                        <label for="floatingPassword" style="color: #000">Password</label>
                        <div class="invalid-feedback">
                          Please enter a Password.
                        </div>
                      </div>
                      
                      <div class="col-12">
                      <br>
                        <p class="small mb-0" style="color: #000; text-align: left !important;"><a href="forgot_employer.php" style="color: #000;">Forgot Password?</a></p>
                      </div>

                      <div class="col-12">
                        <button class="btn w-100" type="submit" name="login" style="background: #6559ca; color: white;">Login</button>
                      </div>

                      <div class="col-12">
                        <p class="small mb-0" style="text-align: center !important; color: #000;"><a href="register_employer.php" style="color: #6559ca; ">Create an account</a></p>
                      </div>

                      <br><br>

                      <div class="col-12">
                        <a href="../index.php" class="small mb-0" style="color: #000; font-family: 'Roboto', sans-serif !important;">Cancel Login</a>
                      </div>
                    </form>

                  </div>
                </div>
  
              </div>
            </div>
          </div>

  
        </section>
      </div>
    
      
    </main><!-- End #main -->
  
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
  <?php include '../body/footer.php';?>
  </body>
</html>

<!-- JOB VANCANCIES TABLE
- job_id (PRIMARY KEY)
- job_title (ex. IT specialist)
- Job_type(ex. Full time, part time, contract, temporary, internship)
- years_of_experience
- skills(Preferred skills)
- salary
- benefits
- job_address(street, barangay,city,country)
- job description(200 characters)
- date_posted


APPLICANT TABLE
- A_id
- A_lastName
- A_firstName
- A_middleName
- dob(date of birth) (mm/dd/yyyy)
- place_of_birth
- address (Number, Street, City, State, Zip Code)
- mobile_number
- email_address
- password(hashed)
- date_joined

RESUME TABLE
- r_id
- a_id
- resume attachement
- date_posted -->
