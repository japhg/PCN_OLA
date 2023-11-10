<?php
require "../database/connection.php";
session_start();
$errors = array();

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $query = "SELECT verify_token, verify_status FROM employer_tbl WHERE verify_token = '$token' LIMIT 1";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        if($row['verify_status'] == "0")
        {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE employer_tbl SET verify_status = '1' WHERE verify_token = '$clicked_token' LIMIT 1";
            $update_result = mysqli_query($con, $update_query);

            if($update_result)
            {
                $_SESSION['message'] = "Your account has been verified successfully!";
                header("location: login_employer.php");
                exit(0);
            }
            else
            {
                $errors['error'] = "Verification Failed!";
                header("location: login_employer.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['warningmessage'] = "Email already verified. Please login!";
            header("location: login_employer.php");
            exit(0);
        }
    }
    else
    {
        $errors['error'] = "This token doesn't exists!";
        header("location: login_employer.php");
    }
}
else
{
    $errors['error'] = "Not allowed!";
    header("location: login_employer.php");
}
?>