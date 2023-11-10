<?php
require "../database/connection.php";
// Get the exam ID from the AJAX request
$exam_id = $_POST['exam_id'];

// Query the database to retrieve the exam data
$query = "SELECT * FROM hr1_exam WHERE id = $exam_id";
$result = mysqli_query($con, $query);

// Generate HTML code for the exam questions
$html = "";
if (mysqli_num_rows($result)) {
  while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<div class='question'>";
    $html .= "<ul>";
    $html .= '<li><h4 style="font-family: "Jamesphilip Bold", sans-serif;">' . $row['exam_title'] . "</h4></li><br>";
    if($row['exam_duration'] === "120"){
      $html .= "<li>Time limit:  2 Hours </li><br>";
    } elseif($row['exam_duration'] === "60"){
      $html .= "<li>Time limit:  1 Hour</li><br>";
    } elseif($row['exam_duration'] === "30"){
      $html .= "<li>Time limit:  30 minutes </li><br>";
    } elseif($row['exam_duration'] === "10"){
      $html .= "<li>Time limit:  10 minutes </li><br>";
    } elseif($row['exam_duration'] === "5"){
      $html .= "<li>Time limit:  5 minutes </li><br>";
    }
    
    $html .= "<li>Total Items: " . $row['num_items'] . " items</li>";
    $html .= '<li><a href="take_examination.php?id=' . $row['id'] . '" target="_blank" class="btn mt-4" style="background: #57d8cd; color: #fff;">Take Exam</a></li>';
    // $html .= '<li><button class="btn btn-success mt-4" onclick="openPopup()">Take Exam</button></li>';
    $html .= "</div>";
  }
}

// Return the HTML code
echo $html;
?>