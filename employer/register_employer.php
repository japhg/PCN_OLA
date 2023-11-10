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
    $mail->Username   = 'jpgomera19@gmail.com';
    $mail->Password   = 'pmikvkfoyejorpgc';

    $mail->IsHTML(true);
    $mail->AddAddress($email, "esteemed customer");
    $mail->SetFrom("jpgomera19@gmail.com", "My website");
    $mail->Subject = "Email Verification from Job Portal";

    $email_content = "
    <h2>You have registered to Job Portal</h2>
    <h5>Please verify your email address to login with the given below link</h5>
    <br><br>
    <a href='http://localhost/Alegario%20Cure%20HMS/hr/JobPortal/employer/verify_email.php?token=$verify_token'>Click here to verify</a>
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
  $contact = clean(mysqli_real_escape_string($con, $_POST["contact"]));
  $companyName = clean(mysqli_real_escape_string($con, $_POST["companyName"]));
  $street = clean(mysqli_real_escape_string($con, $_POST["street"]));
  $barangay = clean(mysqli_real_escape_string($con, $_POST["barangay"]));
  $city = clean(mysqli_real_escape_string($con, $_POST["city"]));
  $state = clean(mysqli_real_escape_string($con, $_POST["state"]));
  $description = clean(mysqli_real_escape_string($con, $_POST["description"]));
  $verify_token = md5(rand());
  $profile_image = "defaultProfile.png";

  $email_check = "SELECT email_address FROM employer_tbl WHERE email_address = '$email'";
  $res = mysqli_query($con, $email_check);
  if (mysqli_num_rows($res) > 0) {
    $errors['error'] = "Email Address is already exist!";
  } else {

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

          if (!empty($email) && !empty($hashedPassword) && !empty($firstname) && !empty($middlename) && !empty($lastname) && !empty($contact) && !empty($companyName) && !empty($street) && !empty($barangay) && !empty($city) && !empty($state) && !empty($description)) {

            // Insert the record into the MySQL table
            $query = "INSERT INTO employer_tbl (email_address, password, firstname, middlename, lastname, contact_number, companyName, street, barangay, city, state, description, verify_token, companyLogo, e_profile)
            VALUES ('$email', '$hashedPassword', '$firstname', '$middlename', '$lastname', '$contact','$companyName','$street','$barangay','$city','$state','$description','$verify_token','$fileName','$profile_image')";

            $results = mysqli_query($con, $query);

            if ($results) {
              // Record was successfully inserted
              $_SESSION['email'] = $email;
              $_SESSION['password'] = $password;

              sendemail_verify("$email", "$verify_token");
              $_SESSION['message'] = "Registration Successful. Please check your email for verification.";
              header("location: login_employer.php");
            } else {
              // Insertion failed
              $errors['error'] = "Registration Unsuccessful";
            }
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

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <!-- Modified CSS-->
  <link rel="stylesheet" href="../css/style/register.css">
  <link rel="stylesheet" href="../css/style/loader.css">
  <link rel="stylesheet" href="../css/bootstrap.css">

  

  <title>Register - Employer</title>

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
    <img src="../img/Reading list-bro.svg" width="40%" class="rounded" alt="..." id="bg">
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
                  <img src="../img/hrlogo.png" alt="HR Logo" width="30%">
                  <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; font-weight: 600; color: #000;">JOB PORTAL</span>
                </a>
              </div><!-- End Logo -->


              <div class="card mb-3" style="border: none;">

                <div class="card-body" id="card-body" style="background: #fff; color: #000;">
                  <div class="pt-4 pb-2">
                    <h2 class="card-title text-center " style="color: #6559ca; font-weight: 800;">REGISTER AN ACCOUNT</h2>
                    <br>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
                    <input type="hidden" name="id" id="form-id" value="">
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
                    <div class="form-floating  col-md-12 col-lg-12">
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="Last Name" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="contact" style="color: #000">Contact Number</label>
                      <div class="invalid-feedback">
                        Please input Contact Number.
                      </div>
                    </div>
                    <span id="left"><br><br><b>COMPANY DETAILS:</b></span>
                    <div class="form-floating  col-md-12 col-lg-12">
                      <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="companyName" class="form-label">Company Name</label>
                      <div class="invalid-feedback">
                        Please input Company Name.
                      </div>
                    </div>

                    <span id="left"><br>Company Address</span>
                    <div class="form-floating  col-md-12 col-lg-12">
                      <input type="text" class="form-control" name="street" id="street" placeholder="Street" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="street" class="form-label">Street</label>
                      <div class="invalid-feedback">
                        Please input Street.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-12">
                      <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Barangay" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="barangay" class="form-label">Barangay</label>
                      <div class="invalid-feedback">
                        Please input Barangay.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-12">
                      <input type="text" class="form-control" name="city" id="city" placeholder="City" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="city" class="form-label">City</label>
                      <div class="invalid-feedback">
                        Please input City.
                      </div>
                    </div>
                    <div class="form-floating  col-md-12 col-lg-12">
                      <input type="text" class="form-control" name="state" id="state" placeholder="State" style="background-color: inherit; border-top: none; border-left: none; border-right: none; box-shadow: none !important; border-color: #000 !important;" required>
                      <label for="state" class="form-label">State</label>
                      <div class="invalid-feedback">
                        Please input State.
                      </div>
                    </div>
                    <div class=" col-md-12 col-lg-12">
                      <span id="left"><br>Company Description</span>
                      <textarea name="description" id="description" class="form-control" cols="30" rows="10" style="box-shadow: none; border: 1px solid #000 !important;" required></textarea>
                      <div class="invalid-feedback">
                        Please input Company Description.
                      </div>
                    </div>
                    <div class=" col-md-12 col-lg-12">
                      <label for="formFile" class="form-label">Company Logo</label>
                      <input type="file" class="form-control" name="file" id="formFile" style="border: 1px solid #000 !important;" required>
                      </div>




                    <div class="col-12">
                      <br><br>
                      <p class="small mb-0" style="color: #000;">By continuing, you acknowledge that you accept Job Portal's <a href="register_applicant.html" style="color: #6559ca;">Privacy Policies</a> and <a href="" style="color: #6559ca;">Terms & Conditions</a></p>
                    </div>

                    <div class="col-12">
                      <button class="btn w-100" type="submit" id="register" name="register" style="color: white;  background: linear-gradient(to right, #6559ca, #6E45E1);">Register</button>
                      <br><br>
                      <a  href="login_employer.php" class="small mb-0" style="color: #000; ">Cancel Registration</a>
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