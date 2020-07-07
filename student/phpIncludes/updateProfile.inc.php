<?php
    include '../../DBconnection.php';
    session_start();
    
    $current_login = $_SESSION ['StudentID'];
    $weekNumber = $_SESSION['student_weekSelection'];

    $course = $_POST['course'];
    $year_of_study = $_POST['year_of_study'];
    $ipt_weeks = $_POST['ipt_weeks'];
    $email_address = $_POST['email_address'];
    $phoneNumber = $_POST['phoneNumber'];


    $update_info = "UPDATE student_info SET course = '$course', EmailAddress = '$email_address', PhoneNumber='$phoneNumber', ipt_weeks='$ipt_weeks', year_of_study = '$year_of_study' WHERE StudentID = '$current_login'";
    $run_update_query = $conn -> query ($update_info);
    

//course
//year_of_study
//ipt_weeks
//email_address
//phoneNumber
 
    $url3 = "../pages/profile.php";
    header ('Location: '.$url3);   

?>
    

    