<?php
include '../database/connection.php';
include '../body/function.php';

session_start();
$errors = array();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../special_features/vendor/autoload.php';
require '../special_features/vendor/phpmailer/phpmailer/src/Exception.php';
require '../special_features/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../special_features/vendor/phpmailer/phpmailer/src/SMTP.php';
function sendemail_verify($email,$verify_token)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();

    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = 'jphigomera19@gmail.com';
    $mail->Password   = 'lavhavwsxxlzvhyw';

    $mail->IsHTML(true);
    $mail->AddAddress($email, "esteemed customer");
    $mail->SetFrom("jphigomera19@gmail.com", "Job Portal");
    $mail->Subject = "Email Verification from Job Portal";

    $email_content = "
    <h2>You have registered to Job Portal</h2>
    <h5>Please verify your email address to login with the given below link</h5>
    <br><br>
    <a href='https://jobportal.alegariocurehms.com/applicant/verify_email_applicant.php?token=$verify_token' class='btn btn-info'>Click here to verify</a>
    ";

    $content = $email_content;

    $mail->MsgHTML($content);
    $mail->Send();
}

if (isset($_POST['register'])) {
  $email = clean(mysqli_real_escape_string($con, $_POST["email"]));
  $password = clean(mysqli_real_escape_string($con, $_POST["password"]));
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $firstname = clean(mysqli_real_escape_string($con, $_POST["firstname"]));
  $middlename = clean(mysqli_real_escape_string($con, $_POST["middlename"]));
  $lastname = clean(mysqli_real_escape_string($con, $_POST["lastname"]));
  $gender = clean(mysqli_real_escape_string($con, $_POST["gender"]));
  $age = clean(mysqli_real_escape_string($con, $_POST["age"]));
  $mobile_number = clean(mysqli_real_escape_string($con, $_POST["mobile_number"]));
  $dob = clean(mysqli_real_escape_string($con, $_POST["dob"]));
  $pob = clean(mysqli_real_escape_string($con, $_POST["pob"]));
  $street = clean(mysqli_real_escape_string($con, $_POST["street"]));
  $barangay = clean(mysqli_real_escape_string($con, $_POST["barangay"]));
  $city = clean(mysqli_real_escape_string($con, $_POST["city"]));
  $state = clean(mysqli_real_escape_string($con, $_POST["state"]));
  $zip = clean(mysqli_real_escape_string($con, $_POST["zip"]));
  $verify_token = md5(rand());

  // Email checking
  $email_check = "SELECT email_address FROM hr1_applicant WHERE email_address = '$email'";
  $res = mysqli_query($con, $email_check);
  if (mysqli_num_rows($res) > 0) 
  {
    $errors['error'] = "Email Address is already exist!";
  } else 
  {
    if(!empty($email) && !empty($hashedPassword) && !empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($gender) && !empty($age) && !empty($mobile_number) && !empty($dob) && !empty($pob) && !empty($street) && !empty($barangay) && !empty($city) && !empty($state) && !empty($zip)) {

      // Insert the record into the MySQL table
      $query = "INSERT INTO hr1_applicant (email_address, password, firstname, middlename, lastname, gender, age, mobile_number, birthdate, birthplace, street, barangay, city, state, zip_code, verify_token)
         VALUES ('$email', '$hashedPassword', '$firstname', '$middlename', '$lastname', '$gender', '$age', '$mobile_number', '$dob', '$pob', '$street', '$barangay', '$city', '$state', '$zip','$verify_token')";

      $results = mysqli_query($con, $query);

      if ($results) {

        // Record was successfully inserted
        // $_SESSION['logged_in'] = array(
        //   'email' => $row['email_address'],
        //   'password' => $row['password']
        // );
        $_SESSION['email'] = $row['email_address'];
        $_SESSION['password'] = $row['password'];

        sendemail_verify("$email","$verify_token");
        $_SESSION['message'] = "Successfully register. Please check your email for verification.";
        echo '<script type="text/javascript">window.close();</script>';
      } else {
        // Insertion failed
        echo "Registration Unsuccessful";
      }
    }
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
  <script src="https://kit.fontawesome.com/f63d53b14e.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <!-- Modified CSS-->
  <link rel="stylesheet" href="../css/style/register.css">
  <link rel="stylesheet" href="../css/style/loader.css">
  <link rel="stylesheet" href="../css/bootstrap.css">




  <title>Register - Applicant</title>

  <style>
    .alert {
      display: none;
    }

    .requirements {
      list-style-type: none;
    }

    .wrong .fa-check {
      display: none;
    }

    .good .fa-times {
      display: none;
    }
  </style>
</head>

<body>
  <?php include '../body/loader.php'; ?>
  <main>
    <div class="row justify-content-right" style="width: 100vh;"></div>
    <img src="../img/Enter OTP-cuate.svg" width="40%" class="rounded" alt="..." id="bg">
    </div>
    <div class="container">
      <?php
      if (count($errors) > 0) {
      ?>
        <?php
        foreach ($errors as $showerror) {
        ?>
          <script>
            Swal.fire({
            icon: 'error',
            title: 'Engk...',
            text: "<?php echo $showerror?>",
          })
          </script>
        <?php
        }

        ?>
      <?php
      }
      ?>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-left">
            <div class="col-lg-7 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4" id="logo">
                <a href="../index.php" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/alegario_logo.png" alt="HR Logo" width="30%">
                  <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; font-weight: 600; color: #000;">ALEGARIO CURE HOSPITAL</span>
                </a>
              </div><!-- End Logo -->


              <div class="card mb-3" style="border: none;">

                <div class="card-body" id="card-body" style="background: #fff; color: #000;">
                  <div class="pt-4 pb-2">
                    <h2 class="card-title text-center " style="color: #1d8a81; font-weight: 800;">REGISTER AN ACCOUNT</h2>
                    <br>
                  </div>

                 <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                    <div class="form-floating col-sm-12 col-md-12 col-lg-6">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="email" style="color: #000">Email Address</label>
                      <div class="invalid-feedback">
                        Please input Email Address.
                      </div>
                    </div>

                    <div class="form-floating col-md-12 col-lg-6">
                      <input type="password" class="form-control validate" name="password" id="password" placeholder="Password" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                      <label for="password" style="color: #000">Password</label>
                      <div class="invalid-feedback">Please input Password.</div>
                    </div>

                    <div class="alert alert-warning password-alert" role="alert">
                      <ul>
                        <li class="requirements leng"><i class="fas fa-check green-text"></i></i></i><i class="fas fa-times red-text"></i> Your password must have at least 8 characters.</li>
                        <li class="requirements big-letter"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 big letter.</li>
                        <li class="requirements num"><i class="fas fa-check green-text"></i><i class="fas fa-times red-text"></i> Your password must have at least 1 number.</li>
                      </ul>
                    </div>


                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="firstname" style="color: #000">First Name</label>
                      <div class="invalid-feedback">
                        Please input First Name.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="middlename" style="color: #000">Middle Name</label>
                      <div class="invalid-feedback">
                        Please input Middle Name.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="lastname" style="color: #000">Last Name</label>
                      <div class="invalid-feedback">
                        Please input Last Name.
                      </div>
                    </div>

                    <fieldset>
                      <legend class="col-form-label col-lg-12 col-md-12 col-sm-2 pt-0">Gender</legend>
                      <div class="col-sm-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required checked>
                          <label class="form-check-label" for="gender">Male</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" required>
                          <label class="form-check-label" for="gender">Female</label>
                        </div>
                      </div>
                    </fieldset>

                    <div class="form-floating  col-md-12 col-lg-2">
                      <input type="number" class="form-control" name="age" id="age" placeholder="Age" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="age" class="form-label">Age</label>
                      <div class="invalid-feedback">
                        Please input Age.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="mobile_number" class="form-label">Mobile Number</label>
                      <div class="invalid-feedback">
                        Please input Mobile Number.
                      </div>
                    </div>
                    <div class="form-floating col-md-12 col-lg-3">
                      <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="dob" class="form-label">Date of Birth</label>
                      <div class="invalid-feedback">
                        Please input Date of Birth.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-3">
                      <input type="text" class="form-control" name="pob" id="pob" placeholder="Place of Birth" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important;;box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="pob" class="form-label">Place of Birth</label>
                      <div class="invalid-feedback">
                        Please input Place of Birth.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-7">
                      <input type="text" class="form-control" name="street" id="street" placeholder="Ex. 1234 Main St" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="street" class="form-label">Street</label>
                      <div class="invalid-feedback">
                        Please input Street.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-5">
                      <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Ex. Barangay Kaligayahan Quirino Highway, Novaliches" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="barangay" class="form-label">Barangay</label>
                      <div class="invalid-feedback">
                        Please input Barangay.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="text" class="form-control" name="city" id="city" placeholder="Ex. Quezon City" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="city" class="form-label">City</label>
                      <div class="invalid-feedback">
                        Please input City.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="text" class="form-control" name="state" id="state" placeholder="Ex. Metro Manila, Philippines" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="state" class="form-label">State</label>
                      <div class="invalid-feedback">
                        Please input State.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-4">
                      <input type="number" class="form-control" name="zip" id="zip" placeholder="Ex. 1119" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="zip" class="form-label">Zip Code</label>
                      <div class="invalid-feedback">
                        Please input Zip Code.
                      </div>
                    </div>

                    <div class="col-12">
                      <br><br>
                      <p class="small mb-0" style="color: #000;">By continuing, you acknowledge that you accept Job Portal's <a href="register_applicant.html" style="color: #57d8cd; ">Privacy Policies</a> and <a href="" style="color: #57d8cd;">Terms & Conditions</a></p>
                    </div>

                    <div class="col-12">
                      <button class="btn w-100" type="submit" id="register" name="register" style="background: #57d8cd; color: white; box-shadow: none;">Register</button>
                      <br><br>  
                    </div>
                    <br><br>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>


      </section>
    </div>
  </main>

  <script>
    $(function() {
      var $password = $(".form-control[type='password']");
      var $passwordAlert = $(".password-alert");
      var $requirements = $(".requirements");
      var leng, bigLetter, num, specialChar;
      var $leng = $(".leng");
      var $bigLetter = $(".big-letter");
      var $num = $(".num");
      // var $specialChar = $(".special-char");
      // var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
      var numbers = "0123456789";

      $requirements.addClass("wrong");
      $password.on("focus", function() {
        $passwordAlert.show();
      });

      $password.on("input blur", function(e) {
        var el = $(this);
        var val = el.val();
        $passwordAlert.show();

        if (val.length < 8) {
          leng = false;
        } else if (val.length > 7) {
          leng = true;
        }


        if (val.toLowerCase() == val) {
          bigLetter = false;
        } else {
          bigLetter = true;
        }

        num = false;
        for (var i = 0; i < val.length; i++) {
          for (var j = 0; j < numbers.length; j++) {
            if (val[i] == numbers[j]) {
              num = true;
            }
          }
        }

        // specialChar=false;
        // for(var i=0; i<val.length;i++){
        //     for(var j=0; j<specialChars.length; j++){
        //         if(val[i]==specialChars[j]){
        //             specialChar = true;
        //         }
        //     }
        // }

        console.log(leng, bigLetter, num, specialChar);

        if (leng == true && bigLetter == true && num == true) {
          $(this).addClass("valid").removeClass("invalid");
          $requirements.removeClass("wrong").addClass("good");
          $passwordAlert.removeClass("alert-warning").addClass("alert-success");
        } else {
          $(this).addClass("invalid").removeClass("valid");
          $passwordAlert.removeClass("alert-success").addClass("alert-warning");

          if (leng == false) {
            $leng.addClass("wrong").removeClass("good");
          } else {
            $leng.addClass("good").removeClass("wrong");
          }

          if (bigLetter == false) {
            $bigLetter.addClass("wrong").removeClass("good");
          } else {
            $bigLetter.addClass("good").removeClass("wrong");
          }

          if (num == false) {
            $num.addClass("wrong").removeClass("good");
          } else {
            $num.addClass("good").removeClass("wrong");
          }
        }


        if (e.type == "blur") {
          $passwordAlert.hide();
        }
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
    <?php include '../body/footer.php';?>


</body>

</html>