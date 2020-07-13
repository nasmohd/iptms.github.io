<?php
    include '../../DBconnection.php';
    session_start();
    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl); 
    $dot = explode ('.php', $urlComponents[4]); //$dot = Array ( [0] => location_submission.inc [1] => )
//    print_r count($dot);
    $tot = count ($dot);   
//    print_r($dot);

    if (isset($_POST['submit_btn'])){ //normal form submission button has been clicked
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $coName = $_POST['coName'];
        $coAddress = $_POST['coAddress'];
        $supName = $_POST['supName'];
        $supPhoneNumber = $_POST['supPhoneNumber'];
        $coLocation_Desc = $_POST['coLocation_Desc'];
        $loc_coodinates = $_POST['loc_coodinates'];

    //    $startDate = $_GET['startDate'];
    //    $endDate = $_GET['endDate'];
    //    $coName = $_GET['coName'];
    //    $coAddress = $_GET['coAddress'];
    //    $supName = $_GET['supName'];
    //    $supPhoneNumber = $_GET['supPhoneNumber'];
    //    $coLocation_Desc = $_GET['coLocation_Desc'];
    //    $loc_coodinates = $_GET['loc_coodinates'];
        $userID = $_SESSION['StudentID'];

        $checkValues = "SELECT * FROM student_location_info WHERE studentID = '$userID'";
        $run_check = $conn -> query ($checkValues);
        $no_res = mysqli_num_rows($run_check);

        if ($no_res == 0){ 
            //no result means now insert
            $report_sql = "INSERT INTO student_location_info (starting_date, ending_date, CompanyName, CompanyAddress, indSup_name, indSup_phoneNumber, LocationDescription, locationCoord, studentID) VALUES ('$startDate', '$endDate', '$coName', '$coAddress', '$supName', '$supPhoneNumber', '$coLocation_Desc', '$loc_coodinates', $userID)";
            $run_query = $conn -> query ($report_sql);
            $url3 = "../pages/reporting.php";
            header ('Location: '.$url3);
        }

        if ($no_res != 0){ 
            //no result means now insert
            $report_sql2 = "UPDATE student_location_info SET starting_date = '$startDate', ending_date = '$endDate', CompanyName = '$coName', CompanyAddress = '$coAddress' , indSup_name = '$supName', indSup_phoneNumber = '$supPhoneNumber', LocationDescription = '$coLocation_Desc', locationCoord = '$loc_coodinates' WHERE studentID = '$userID'";
            $run_query2 = $conn -> query ($report_sql2);$url3 = "../pages/reporting.php";
            $url3 = "../pages/reporting.php";
            header ('Location: '.$url3); 
        }

    }
    if (isset($_POST['view_btn'])){ //button to view has been clicked
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $coName = $_POST['coName'];
        $coAddress = $_POST['coAddress'];
        $supName = $_POST['supName'];
        $supPhoneNumber = $_POST['supPhoneNumber'];
        $coLocation_Desc = $_POST['coLocation_Desc'];
        $loc_coodinates = $_POST['loc_coodinates'];

    //    $startDate = $_GET['startDate'];
    //    $endDate = $_GET['endDate'];
    //    $coName = $_GET['coName'];
    //    $coAddress = $_GET['coAddress'];
    //    $supName = $_GET['supName'];
    //    $supPhoneNumber = $_GET['supPhoneNumber'];
    //    $coLocation_Desc = $_GET['coLocation_Desc'];
    //    $loc_coodinates = $_GET['loc_coodinates'];
        $userID = $_SESSION['StudentID'];

        $checkValues = "SELECT * FROM student_location_info WHERE studentID = '$userID'";
        $run_check = $conn -> query ($checkValues);
        $no_res = mysqli_num_rows($run_check);

        if ($no_res == 0){ 
            //no result means now insert
            $report_sql = "INSERT INTO student_location_info (starting_date, ending_date, CompanyName, CompanyAddress, indSup_name, indSup_phoneNumber, LocationDescription, locationCoord, studentID, test_location) VALUES ('$startDate', '$endDate', '$coName', '$coAddress', '$supName', '$supPhoneNumber', '$coLocation_Desc', '$loc_coodinates', $userID, '$loc_coodinates')";
            $run_query = $conn -> query ($report_sql);
            $url3 = "../pages/reporting.php#show_map";
            header ('Location: '.$url3);
        }

        if ($no_res != 0){ 
            //if an entry is already present
            $report_sql2 = "UPDATE student_location_info SET starting_date = '$startDate', ending_date = '$endDate', CompanyName = '$coName', CompanyAddress = '$coAddress' , indSup_name = '$supName', indSup_phoneNumber = '$supPhoneNumber', LocationDescription = '$coLocation_Desc', test_location = '$loc_coodinates' WHERE studentID = '$userID'";
            $run_query2 = $conn -> query ($report_sql2);
            $url3 = "../pages/reporting.php#show_map";
            header ('Location: '.$url3); 
        }
        
        
    }

    
    
//    $report_res = $run_query -> fetch_assoc();
    
    
//    $url3 = "../pages/reporting.php";
//    header ('Location: '.$url3);   

?>
    

    