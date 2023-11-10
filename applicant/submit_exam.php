<?php
require "../database/connection.php";

// Retrieve the exam ID and the number of questions from the POST request
$exam_id = $_POST['exam_id'];
$applicant_id = $_POST['applicant_id'];
$num_questions = $_POST['num-questions'];
$correct_answers = array();

// Loop through each question and retrieve the answer from the POST request
for ($i = 1; $i <= $num_questions; $i++) {
    $question_id = $_POST['question_id_'.$i];
    $answer = $_POST['answer_'.$i];

    // Insert the answer into the database
    $insert_query = "INSERT INTO hr1_answer (applicant_id, exam_id, question_id, applicant_answer) VALUES ('$applicant_id','$exam_id', '$question_id', '$answer')";
    mysqli_query($con, $insert_query);

    // Query the database to retrieve the correct answer for the current question
    $query = "SELECT correct_answer_option FROM hr1_question WHERE id = $question_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $correct_answer = $row['correct_answer_option'];

    // Add the correct answer to the array of correct answers
    $correct_answers[$i] = $correct_answer;
}

// Check the correctness of each answer
$num_correct = 0;
for ($i = 1; $i <= $num_questions; $i++) {
    if ($_POST['answer_'.$i] == $correct_answers[$i]) {
        $num_correct++;
    }
}

// Calculate the percentage score
$score = round(($num_correct / $num_questions) * 100);

// Fetch Resume ID
$sql = "SELECT app.*, resumes.*
    FROM hr1_resume resumes, hr1_applicant app
    WHERE app.id = resumes.applicant_id 
    AND resumes.applicant_id = '$applicant_id'";
$sqlresult = mysqli_query($con, $sql);
$sqlrow = mysqli_fetch_assoc($sqlresult);
$resume_id = $sqlrow['id'];

//  // Fetch Jobs ID
//           $fetchJobs = "SELECT resumes.*, applicant.*, job.*
//           FROM hr1_resume resumes, hr1_applicant applicant, hr_job_list job
//           WHERE resumes.applicant_id = applicant.id
//           AND resumes.job_list_id = job.id
//           AND resumes.applicant_id = '$applicant_id' 
//           AND resumes.id = '$resume_id'";
//           $fetchJobsResult = mysqli_query($con, $fetchJobs);
//           $fetchJobsRows = mysqli_fetch_assoc($fetchJobsResult);
//           $job_id = $fetchJobsRows['id'];

// echo $job_id;
        $status = "Examination Passed";
        $status_failed = "Examination Failed";
        $resumeStatusPassed = "For Final Interview";
        $resumeStatusFailed = "Rejected";


    if($score >= 60){
        // Insert the score into the database
        $insert_query = "INSERT INTO hr1_score ( applicant_id, exam_id, score, score_percentage, remarks, resumeStatus) 
        VALUES ('$applicant_id', '$exam_id', '$num_correct', '$score', '$status', '$resumeStatusPassed')";
        $inserting_result = mysqli_query($con, $insert_query);

        if($inserting_result){
            
            $update_query_rate = "UPDATE hr1_ratings SET examination_score = '$num_correct' 
            WHERE applicant_id = '$applicant_id' AND resume_id = '$resume_id'";
            $update_result_rate = mysqli_query($con, $update_query_rate);
            if($update_result_rate){
                 // Redirect the user to a "thank you" page or display a message to indicate that their answers have been saved
                header('Refresh: 2; URL = exam.php');
                echo '<script type="text/javascript">
                window.close();
                window.opener.location.reload();</script>';
            }
        }
    }
    else{
        $insert_query = "INSERT INTO hr1_score ( applicant_id, exam_id, score, score_percentage, remarks, resumeStatus) 
        VALUES ('$applicant_id', '$exam_id', '$num_correct', '$score', '$status_failed', '$resumeStatusFailed')";
        $inserting_result = mysqli_query($con, $insert_query);

        if($inserting_result){
            $update_query_rate = "UPDATE hr1_ratings SET examination_score = '$num_correct' 
            WHERE applicant_id = '$applicant_id' AND resume_id = '$resume_id'";
            $update_result_rate = mysqli_query($con, $update_query_rate);
            if($update_result_rate){
                 // Redirect the user to a "thank you" page or display a message to indicate that their answers have been saved
                header('Refresh: 2; URL = exam.php');
                echo '<script type="text/javascript">
                window.close();
                window.opener.location.reload();</script>';
            }
           
        }
    }
?>