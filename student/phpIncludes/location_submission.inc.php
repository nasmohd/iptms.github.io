<?php
    include '../../DBconnection.php';
    session_start();
    
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
    $coName = $_GET['coName'];
    $coAddress = $_GET['coAddress'];
    $supName = $_GET['supName'];
    $supPhoneNumber = $_GET['supPhoneNumber'];
    $coLocation_Desc = $_GET['coLocation_Desc'];
    $loc_coodinates = $_GET['loc_coodinates'];
    

    $userID = $_SESSION['StudentID'];

    $report_sql = "INSERT INTO student_location_info (starting_date, ending_date, CompanyName, CompanyAddress, indSup_name, indSup_phoneNumber, LocationDescription, locationCoord, studentID) VALUES ('$startDate', '$endDate', '$coName', '$coAddress', '$supName', '$supPhoneNumber', '$coLocation_Desc', '$loc_coodinates', $userID)";
    $run_query = $conn -> query ($report_sql);
//    $report_res = $run_query -> fetch_assoc();
    
    
    $url3 = "../pages/reporting.php";
    header ('Location: '.$url3);   

?>
    

    