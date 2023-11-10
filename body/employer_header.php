<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <nav class="top-nav">
        <div class="nav">
            <div class="d-flex justify-content-start" id="logo" style="width: 100%;">
                <a href="../index.php" class="logo d-flex align-items-center w-auto" style="box-shadow: none;">
                    <img src="../img/hrlogo.png" alt="HR Logo" width="20%">
                    <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">JOB<b id="animated-text" style="font-family: 'Poiret One', cursive !important;"> PORTAL</b></span>
                </a>
            </div>

            <div class=".menu-page d-flex justify-content-center py-4" style="width: 100%;">
                <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                    <div class='menu-button'></div>
                </label>


                <ul class="menu">
                    <li><button class="btn"><a class="active" href="dashboard.php">DASHBOARD</a></button></li>
                    <li><button class="btn"><a href="manage_jobs.php">MANAGE_JOBS</a></button></li>
                    <li><button class="btn"><a href="postJob.php">POST_JOBS</a></button></li>
                    <li><button class="btn"><a href="employer_profile.php">PROFILE</a></button></li>
                    <li><button class="btn" id="login"><a href="../body/logout.php">LOGOUT</a></button></li>
                </ul>
            </div>
            <div class="d-flex justify-content-end py-4" id="icons" style="width: 100%; visibility: hidden;">
        <div class="icons">
          <a href="#" target="_blank" class="fa fa-facebook-square"></a>
          <a href="#" target="_blank" class="fa fa-instagram"></a>
          <a href="#" target="_blank" class="fa fa-twitter"></a>
          <a href="#" target="_blank" class="fa fa-google"></a>
        </div>
      </div>
        </div>
</nav>

</body>

</html>