<?php
session_start();
include '../database/connection.php';


if (isset($_SESSION['email'], $_SESSION['password'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <title></title>
    <style>
      .question input[type=radio]:checked+label {
        background-color: green;
        color: white;
      }
    </style>
  </head>

  <body>
    <?php include '../body/loader.php';
    ?>
    <div class="container d-flex justify-content-start mt-5">
      <?php

      // Get the exam ID from the AJAX request
      $exam_id = $_GET['id'];

      // Query the database to retrieve the exam data
      $query = "SELECT * FROM hr1_exam WHERE id = $exam_id";
      $result = mysqli_query($con, $query);

      $query2 = "SELECT * FROM hr1_applicant WHERE email_address = '" . $_SESSION['email'] . "'";
      $result2 = mysqli_query($con, $query2);
      $row2 = $row = mysqli_fetch_assoc($result2);
      $applicant_id = $row2['id'];
      // Generate HTML code for the exam questions
      $html = "";
      $num_questions = 0;
      if (mysqli_num_rows($result)) {
        $html .= "<div class='question-container'>";

        while ($row = mysqli_fetch_assoc($result)) {
          // Add hidden input field for exam ID
          $html .= '<form method="post" action="submit_exam.php">';
          $html .= "<input type='hidden' name='applicant_id' value='" . $applicant_id . "'>";
          $html .= "<input type='hidden' name='exam_id' value='" . $row['id'] . "'>";

          // Query the database to retrieve the questions and options
          $query_questions = "SELECT * FROM hr1_question WHERE exam_id = $exam_id";
          $result_questions = mysqli_query($con, $query_questions);

          if (mysqli_num_rows($result_questions)) {
            $num_questions = mysqli_num_rows($result_questions);

            // Add hidden input field with total number of questions
            $html .= "<input type='hidden' name='num-questions' value='$num_questions'>";

            $i = 1;
            while ($row_question = mysqli_fetch_assoc($result_questions)) {
              $question_id = $row_question['id'];

              // Add input field for question ID
              $html .= "<input type='hidden' name='question_id_$i' value='$question_id'>";

              $question_title = $row_question['question_title'];
              $html .= "<div class='question' name='question$i' id='question$i'>";
              $html .= "<p>$question_title</p>";

              // Query the database to retrieve the options for the current question
              $query_options = "SELECT * FROM hr1_option WHERE question_id = $question_id";
              $result_options = mysqli_query($con, $query_options);

              if (mysqli_num_rows($result_options)) {
                while ($row_option = mysqli_fetch_assoc($result_options)) {
                  $option_id = $row_option['id'];
                  $option_title = $row_option['option_title'];
                  $option_number = $row_option['option_number'];

                  // Generate HTML code for the current option
                  $html .= "<input type='radio' name='answer_$i' value='$option_number'> $option_title<br>";
                }
              }
              $html .= "</div>";
              $i++;
            }
          }
        }
        $html .= "<hr>";
        $html .= "<div class='button-container'>";
        $html .= "<button type='button' class='btn btn-secondary' id='prev-btn' disabled>Previous</button> &nbsp;";

        $html .= "<button type='button' class='btn btn-primary' id='next-btn' style='box-shadow: none;'>Next</button>  ";
        $html .= "<br><br><button type='submit' class='btn' name='submit' style='background: #57d8cd; color: #fff;'>Submit</button>";
        $html .= "</div>";
        $html .= "</form>";
        $html .= "</div>";
      }

      // Close the database connection
      mysqli_close($con);

      // Echo the generated HTML code
      echo $html;
      ?>

    </div>
    <?php

    require "../database/connection.php";

    // Get the total number of questions
    $exam_id = $_GET['id'];
    $sql = "SELECT num_items FROM hr1_exam WHERE id = $exam_id";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $numQuestions = $row["num_items"];
    } else {
      $numQuestions = 0;
    }

    mysqli_close($con);

    ?>
    <script src="exam.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>

  </html>
  <script>
    var numQuestions = <?php echo $numQuestions; ?>; //
    var currentQuestion = 1;
    var currentSelections = {};

    // Hide all questions except the first one
    $('.question').not('#question1').hide();

    // Update the question number when the user clicks on a page button
    $('.page-btn').click(function() {
      var page = $(this).data('page');
      currentQuestion = (page - 1) * 3 + 1;
      updateQuestionNumber();
      showQuestions();
    });

    // Show the next question when the user clicks the "Next" button
    $('#next-btn').click(function() {
      if (currentQuestion < numQuestions) {
        currentQuestion++;
        updateQuestionNumber();
        showQuestions();
      }
    });

    // Show the previous question when the user clicks the "Previous" button
    $('#prev-btn').click(function() {
      if (currentQuestion > 1) {
        currentQuestion--;
        updateQuestionNumber();
        showQuestions();
      }
    });

    // Submit the exam when the user clicks the "Submit" button
    $('#submit-btn').click(function() {
      submitExam();
    });

    // Update the current question number
    function updateQuestionNumber() {
      var start = currentQuestion;
      var end = Math.min(numQuestions, currentQuestion + 2);
      $('#question-number').text('Questions ' + start + '-' + end + ' of ' + numQuestions);
    }

    // Show the current question
    function showQuestions() {
      $('.question').hide();
      var question = $('#question' + currentQuestion);
      question.show();
      // Check if the user has already selected an answer for this question
      if (currentSelections[question.attr('id')] !== undefined) {
        question.find('input[value="' + currentSelections[question.attr('id')] + '"]').prop('checked', true);
      }
      updateButtonStates();
    }

    // Update the state of the "Previous" and "Next" buttons
    function updateButtonStates() {
      if (currentQuestion == 1) {
        $('#prev-btn').prop('disabled', true);
      } else {
        $('#prev-btn').prop('disabled', false);
      }
      if (currentQuestion >= numQuestions) {
        $('#next-btn').prop('disabled', true);
      } else {
        $('#next-btn').prop('disabled', false);
      }
    }

    // Submit the exam
    function submitExam() {
      // Create an array to store the user's selections
      var selections = {};

      // Loop through each question and store the user's selection
      for (var i = 1; i <= numQuestions; i++) {
        var question = $('#question', i);
        var answer = question.find('input[name="answer[' + question.attr('id') + ']"]:checked').val();
        if (answer !== undefined) {
          selections[question.attr('id')] = answer;
        }
      }

      // Submit the user's selections via AJAX
      $.ajax({
        type: 'POST',
        url: 'submit_exams.php',
        data: {
          exam_id: <?php echo $exam_id; ?>,
          selections: selections
        },
        success: function(response) {
          // Display the results to the user
          $('#exam-form').hide();
          $('#exam-results').html(response);
          $('#exam-results').show();
        },
        error: function(xhr, status, error) {
          // Display an error message to the user
          alert('An error occurred while submitting the exam: ' + error);
        }
      });
    }
  </script>



  </div>

  </body>

  </html>
<?php
} else {
  header("location: ../index.php");
  session_destroy();
}
unset($_SESSION['prompt']);
?>