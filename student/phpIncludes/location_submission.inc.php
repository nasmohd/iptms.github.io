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
    
    $checkValues = "SELECT * FROM student_location_info WHERE studentID = '$userID'";
    $run_check = $conn -> query ($checkValues);
    $no_res = mysqli_num_rows($run_check);
    
    if ($no_res == 0){ 
        //no result means now insert
        $report_sql = "INSERT INTO student_location_info (starting_date, ending_date, CompanyName, CompanyAddress, indSup_name, indSup_phoneNumber, LocationDescription, locationCoord, studentID) VALUES ('$startDate', '$endDate', '$coName', '$coAddress', '$supName', '$supPhoneNumber', '$coLocation_Desc', '$loc_coodinates', $userID)";
        $run_query = $conn -> query ($report_sql);
    }

    if ($no_res != 0){ 
        //no result means now insert
        $report_sql2 = "UPDATE student_location_info SET starting_date = '$startDate', ending_date = '$endDate', CompanyName = '$coName', CompanyAddress = '$coAddress' , indSup_name = '$supName', indSup_phoneNumber = '$supPhoneNumber', LocationDescription = '$coLocation_Desc', locationCoord = '$loc_coodinates', studentID = $userID";
        $run_query2 = $conn -> query ($report_sql2);
    }

    
//    $report_res = $run_query -> fetch_assoc();
    
    
    $url3 = "../pages/reporting.php";
    header ('Location: '.$url3);   

?>
    

    