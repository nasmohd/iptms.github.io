<?php
    include '../phpIncludes/header.php';
    $current_userID = $_SESSION ['StudentID'];
    $sql_logbook = "SELECT * FROM logbook_entries WHERE userID = '$current_userID'";
    $run = $conn -> query($sql_logbook);
    $logbook_number_rows = mysqli_num_rows ($run);
//echo $logbook_rows;
    $logbook_row = $run -> fetch_assoc();

    //we have filled an entry but it is not verified, INDUSTRIAL SUPERVISOR STATUS
    $sql_statusCheck = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND indSup_verifystatus = '1' AND entry_status = '1'"; 
    $run_statusCheck = $conn -> query ($sql_statusCheck);
    $status_Verified = mysqli_num_rows ($run_statusCheck); //verified

    $sql_statusCheck2 = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND entry_status = '1' AND (indSup_verifystatus = '0' OR indSup_verifystatus = '')"; 
    $run_statusCheck2 = $conn -> query ($sql_statusCheck2);
    $status_notVerified = mysqli_num_rows ($run_statusCheck2); //not verified

    
    //GET TASKS FROM THE DATABASE
    $sql_taskCheck = "SELECT * FROM task_info WHERE StudentID = '1'"; 
    $run_taskStatus = $conn -> query ($sql_taskCheck);
    $row_tasks = $run_taskStatus -> fetch_assoc();
    $number_tasks = mysqli_num_rows ($run_taskStatus);

    //tasks not done
    $sql_taskCheck_status = "SELECT * FROM task_info WHERE StudentID = '1' AND task_status = '0'"; 
    $run_taskStatus_not = $conn -> query ($sql_taskCheck_status);
    $row_tasks_status = $run_taskStatus_not -> fetch_assoc();
    $number_tasks_notDone = mysqli_num_rows ($run_taskStatus_not); //get the number of tasks, 3

    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.', $urlComponents[4]); //$urlComponents[4] = logbook.php?1
//    echo ($urlComponents[4]);
//                    echo $urlComponents[4]; //logbook.php?2
    $dot_len = count($dot);
    $get_no = explode ('?', $dot[1]); //http://localhost/UNI_3rd_year/student/pages/logbook.php?1
    $len_lastURL = count($get_no);
    //$get_no = Array ( [0] => php [1] => request=4 ) 2

    //http://localhost/UNI_3rd_year/student/pages/logbook.php?request=4

?>
        <div class='' id="content">
            <div class="container-fluid">
               <?php
                    if ($len_lastURL == 1){
                        include 'logbook_entry.php';
                        $_SESSION['pendingStatus'] = '0';
                    }
                
                    if ($len_lastURL > 1){
//                        echo ($get_no[1]);
                        $sep_equal = explode ('=', $get_no[1]);
//                        print_r ($sep_equal);
                        $firstname = $_SESSION ['FirstName'];
                        $lastname = $_SESSION ['LastName'];
                        $full = $firstname." ".$lastname;
                        
                        if ($sep_equal[0] == 'request'){ //http://localhost/UNI_3rd_year/student/pages/logbook.php?request=6
                            $get_supervisor = "SELECT * FROM supervision_info WHERE studentID = '$current_userID'";
                            $run_sup = $conn -> query ($get_supervisor);
                            $get_rows_sup = $run_sup -> fetch_assoc();
                            $indSup = $get_rows_sup ['industrial_supervisor_ID'];
                            
                            $notif = $full." Has requested you verify week ".$sep_equal[1]." in logbook";
                            
                            $send_requestQuery = "INSERT INTO notification_info (notification, StudentID, industrial_supervisor_ID, status, logbook_weekNumber) VALUES ('$notif', '$current_userID', '$indSup', '0', '$sep_equal[1]')"; //status = 0 as Pending
                            $run_request = $conn -> query ($send_requestQuery);
                            
                            include 'logbook_entry.php';
//                            $url4 = "http://localhost/UNI_3rd_year/student/pages/logbook.php";
//                            header ('Location: '.$url4);
                            $_SESSION['pendingStatus'] = '1';
                            $_SESSION['selected_week'] = $sep_equal[1];
                        }
                        
                        if ($sep_equal[0] == 'week'){
                            echo "
                                <div class='row mt-4'>
                                <div class='col-lg-8 col-12 ml-auto mr-auto' style='border: 1px solid #306FA0; border-radius:10px;'>
                                ";
                            $current_userID = $_SESSION ['StudentID'];
                            $selected_no = $sep_equal[1];
//                            $sep_weekNumber = explode ()
                            $_SESSION['student_weekSelection'] = $selected_no;
                            $getEntries = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$selected_no'";
                            $getRes = $conn -> query($getEntries);
                            $getRow = $getRes -> fetch_assoc();
                            
                            if ($getRow['week_picture'] == ''){
                                $pic = 'None';   
                            }else {
                                $pic = $getRow['week_picture'];
                            }
                            include 'filled_form.php';

                            echo "
                                </div></div>
                            ";
                            $_SESSION['pendingStatus'] = '0';
                        }
                        
//                        include 'logbook_entry.php';
                    }
                
                    
//                
//                    else {
//                        echo "
//                        <div class='row mt-4'>
//                        <div class='col-lg-8 col-12 ml-auto mr-auto' style='border: 1px solid #306FA0; border-radius:10px;'>
//                        ";
//                        $current_userID = $_SESSION ['StudentID'];
//                        $selected_no = $get_no[1];
//                        $_SESSION['student_weekSelection'] = $selected_no;
//                        $getEntries = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$selected_no'";
//                        $getRes = $conn -> query($getEntries);
//                        $getRow = $getRes -> fetch_assoc();
//                        
//                        include 'filled_form.php';
//                        
//                        echo "
//                        </div></div>
//                        ";
//                        
//                    }
                
                
                ?>
               
               
               
                
            </div>  
        </div>
    </div>
    <!-- End of div wrapper -->

    <div class="overlay"></div>


<?php
    include '../phpIncludes/footer2.php';


?>