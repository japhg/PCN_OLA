<!DOCTYPE html>
<html>
<head>
  <title>Loading...</title>
  <meta name="description" content="A gallery of pure CSS spinners and loading indicators" />
  <meta name="keywords" content="css spinner loading indicator 3d" />
  <link rel="stylesheet" type="text/css" href="../css/style/loader.css">
  <link rel="stylesheet" href="../css/bootstrap.css">


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="jquery-2.1.3.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>

</head>
<body>
<!-- <div class="loader-position" id="loader">
  <div class="loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
</div> -->

<div class="loader-position" id="loader">
<div class="loader"></div>
</div>

<!-- <div class="loader-position" id="loader">
<div class="sky">
  <div class="moon"></div>
  <div class="shadow"></div>
  <svg class="outline" viewBox="0 0 100 100">
    <circle cx="50" cy="50" r="40" stroke="#FFAE00" stroke-width="3" fill="transparent" stroke-dasharray="255" stroke-dashoffset="255" stroke-linecap="round"></circle>
  </svg>
</div>
</div> -->


    <script>
      $(window).on('load',function(){
        $(".loader-position").fadeOut(2500);
      });
    </script>

</body>
</html>