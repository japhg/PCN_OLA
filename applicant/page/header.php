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
        <img src="../../assets/img/alegario_logo.png" alt="HR Logo" width="20%">
        <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">ALEGARIO<b id="animated-text" style="font-family: 'Poiret One', cursive !important;"> CURE</b></span>
      </a>
    </div>

    <div class=".menu-page d-flex justify-content-center py-4" style="width: 100%;">
    <input id="menu-toggle" type="checkbox" />
    <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
    </label>

    <ul class="menu">
      <li><button class="btn"><a href="searchjob.php">HOME</a></button></li>
      <li><button class="btn"><a href="about.php">ABOUT</a></button></li>
      <li><button class="btn"><a href="contact.php">CONTACT</a></button></li>
      <li><button class="btn"><a href="status.php">STATUS</a></button></li>
      <li><button class="btn"><a href="exam.php">EXAM</a></button></li>
      <li><button class="btn" id="profile"><a href="#">PROFILE</a></button></li>
      <li><button class="btn" id="logout"><a href="../body/logout.php">LOGOUT</a></button></li>
    </ul>
</div>

<div class="d-flex justify-content-end py-4" id="icons" style="width: 100%;">
    <div class="icons" >
      <a href="#" target="_blank" class="fa fa-facebook-square"></a>
      <a href="#" target="_blank" class="fa fa-instagram"></a>
      <a href="#" target="_blank" class="fa fa-twitter"></a>
      <a href="#" target="_blank" class="fa fa-google"></a>
      <a href="profile.php" id="profile2">PROFILE</a>
    <button class="btn" id="logout2"><a href="../body/logout.php">LOGOUT</a></button>
    </div>
    </div>
</div>
  </nav>


  <script src="../js/bootstrap.js"></script>
</body>
</html>