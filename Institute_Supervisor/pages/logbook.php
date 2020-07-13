<?php
    include '../phpIncludes/header.php';

    //Shred the URL
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.', $urlComponents[4]); //$urlComponents[4] = logbook.php?1
//    echo ($urlComponents[4]);
//                    echo $urlComponents[4]; //logbook.php?2
    $dot_len = count($dot);
    $get_no = explode ('?', $dot[1]); //http://localhost/UNI_3rd_year/student/pages/logbook.php?1
    $len_lastURL = count($get_no); //$get_no = Array ( [0] => php [1] => 1 )
//    print_r ($get_no);
//    echo $len_lastURL;
//    echo $get_no[1];
    


    if ($len_lastURL > 1){
//        $tester = $_SESSION['tester'];
        
        $more_sep = explode ('=', $get_no[1]); //$more_sep = Array ( [0] => week [1] => 1 )
        $res_cnt = count ($more_sep);
    //    print_r ($more_sep);
        $_SESSION['first'] = $more_sep[0];
        
//        echo $res_cnt;


        if ($more_sep[0] == 'week'){
            //ERROR
            //http://localhost/UNI_3rd_year%20-%20Copy%20(3)/Industrial_Supervisor/pages/logbook_review.php?1
            $selected_ID = $_SESSION['student_selected'];
            $_SESSION['week_true'] = 1;
            $_SESSION['selected_week'] = $more_sep[1];
            $weekNo = $_SESSION['selected_week'];
            include 'logbook_review.php';
        }
        

        if ($more_sep[0] == 'verify'){
            $selected_student = $_SESSION['student_selected'];
            $testerNo = $more_sep[1];
            $_SESSION['testerNo'] = $testerNo;
            $update_indStatus = "UPDATE logbook_entries SET instSup_verifystatus = '1' WHERE weekNumber ='$testerNo' AND userID = '$selected_student'";
            $run_update = $conn -> query ($update_indStatus);
            
//            $_SESSION['tester'] = 1;
        }
    }
    

    //http://localhost/UNI_3rd_year/student/pages/logbook.php?request=4

 
//    echo $selected_student;

    //Get Students that are being supervised
    $current_supervisor = $_SESSION ['InstituteSup_ID'];
    $supervision_query = "SELECT * FROM supervision_info WHERE institute_supervisor_ID = '$current_supervisor'";
    $run_supervision = $conn -> query ($supervision_query);
    $supervision_res = $run_supervision -> fetch_assoc();
    $students_supervised = mysqli_num_rows($run_supervision); //$students_supervised = 4
    $_SESSION['total_students'] = $students_supervised;

    if ($len_lastURL < 2){
    echo "
    <div class='' id='content'>
            <div class='container-fluid'>
            <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>

                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;' id='page_content'>
                               <p class='mt-3'><span style='font-size:15px; color:#333333; font-weight:bold;'> LOGBOOK INFORMATION (STUDENTS UNDER YOUR SUPERVISION) <span></p>
                               
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>SN</span></th>
                      <th><span id='hd_txt'>Name</span></th>
                      <th><span id='hd_txt'>Weeks Submitted</span></th>

                      <th><span id='hd_txt'>Weeks Verified</span></th>
                      
                      <th><span id='hd_txt'>Last Submission Date</span></th>
                    </tr>
                  </thead>
                  
                   <tbody>
    ";
    }

    if (($len_lastURL >= 2) && ($res_cnt == 1)){        
        echo "
    <div class='' id='content'>
            <div class='container-fluid'>
            <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>

                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;' id='page_content'>
                               
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>Week</span></th>
                      <th><span id='hd_txt'>Week Ending</span></th>
                      <th><span id='hd_txt'>Submit Status</span></th>

                      <th><span id='hd_txt'>Industrial Sup</span></th>
                      <th><span id='hd_txt'>Comments</span></th>
                      <th><span id='hd_txt'>Last Submission</span></th>
                    </tr>
                  </thead>
    ";
    }

    if (($len_lastURL >= 2) && ($res_cnt > 1)){
//ERROR
    $first = $_SESSION['first'];
        if ($first != 'week'){
            echo "
    <div class='' id='content'>
            <div class='container-fluid'>
            <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>

                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;' id='page_content'>
                               
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>Week</span></th>
                      <th><span id='hd_txt'>Week Ending</span></th>
                      <th><span id='hd_txt'>Submit Status</span></th>

                      <th><span id='hd_txt'>Industrial Sup</span></th>
                      <th><span id='hd_txt'>Comments</span></th>
                      <th><span id='hd_txt'>Last Submission</span></th>
                    </tr>
                  </thead> 
    ";
        }
//        echo $testerNo;
    }


    $loop3 = 1;
    while ($loop3 <= $students_supervised){ //$students_supervised = 3
        $supervision_query2 = "SELECT * FROM supervision_info WHERE institute_supervisor_ID = '$current_supervisor' AND studentID = '$loop3'"; //starts from 1
        $run_supervision2 = $conn -> query ($supervision_query2);
        $supervision_res2 = $run_supervision2 -> fetch_assoc();
        $students_supervised2 = mysqli_num_rows($run_supervision2); //$students_supervised2
            
        if ($students_supervised2 != 0){ //If results return true
            $current_userID = $loop3;
            
            //get entry of the current student, starts from ID 1 
            //Get individual student, one at a time
            $sql_student = "SELECT * FROM student_info WHERE StudentID = '$current_userID'";
            $run2 = $conn -> query($sql_student);
            $student_num_rows2 = mysqli_num_rows ($run2);
            $student_row = $run2 -> fetch_assoc(); //return 1, 2, 3
            $_SESSION ['ipt_weeks'] = $student_row['ipt_weeks'];
            
            
            //we have filled an entry but it is not verified, INSTITUTE SUPERVISOR STATUS
            $sql_statusCheck = "SELECT * FROM logbook_entries WHERE userID = '$loop3' AND instSup_verifystatus = '1' AND entry_status = '1'"; 
            $run_statusCheck = $conn -> query ($sql_statusCheck);
            $status_Verified = mysqli_num_rows ($run_statusCheck); //verified

            $sql_statusCheck2 = "SELECT * FROM logbook_entries WHERE userID = '$loop3' AND entry_status = '1' OR entry_status ='' AND (instSup_verifystatus = '0' OR instSup_verifystatus = '')"; 
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
            
            //No student was selected
            if ($len_lastURL < 2){
                include 'student_list.php';
                $_SESSION['pendingStatus'] = '0';
            }
             
    }
        $loop3 = $loop3 + 1; 
    }

    if (($len_lastURL >= 2) && ($res_cnt == 1)) { //http://localhost/UNI_3rd_year/Industrial_Supervisor/pages/logbook.php?1
//        echo $len_lastURL;
        $current_userID = $get_no[1];
        $_SESSION['student_selected'] = $current_userID;
        
        $get_student_info = "SELECT * FROM student_info WHERE StudentID = '$current_userID'";
        $run_student = $conn -> query ($get_student_info);
        $get_res_student = $run_student -> fetch_assoc();
        $_SESSION['SelectedStudent_FName'] = $get_res_student['FirstName'];
        $_SESSION['SelectedStudent_LName'] = $get_res_student['LastName'];
        
        $sql_logbook = "SELECT * FROM logbook_entries WHERE userID = '$current_userID'";
        $run = $conn -> query($sql_logbook);
        $logbook_number_rows = mysqli_num_rows ($run);
        $logbook_row = $run -> fetch_assoc();
        
        $sql_statusCheck = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND instSup_verifystatus = '1' AND entry_status = '1'"; 
        $run_statusCheck = $conn -> query ($sql_statusCheck);
        $status_Verified = mysqli_num_rows ($run_statusCheck); //verified

        $sql_statusCheck2 = "SELECT * FROM logbook_entries WHERE userID = '$current_userID'  AND (instSup_verifystatus = '0' OR instSup_verifystatus = '') AND entry_status = '1'"; 
        $run_statusCheck2 = $conn -> query ($sql_statusCheck2);
        $status_notVerified = mysqli_num_rows ($run_statusCheck2);
        //not verified
//        print_r ($run_statusCheck2);
        
//        $_SESSION ['selected_student'] = ;
        include 'logbook_entry.php';
    }

    if (($len_lastURL >= 2) && ($res_cnt > 1)) {
        $first = $_SESSION['first'];
        if ($first != 'week'){
        //ERROR
//        echo $selected_student;
        $current_userID = $_SESSION['student_selected'];
        $sql_logbook = "SELECT * FROM logbook_entries WHERE userID = '$current_userID'";
        $run = $conn -> query($sql_logbook);
        $logbook_number_rows = mysqli_num_rows ($run);
        $logbook_row = $run -> fetch_assoc();
        
        $sql_statusCheck = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND instSup_verifystatus = '1' AND entry_status = '1'"; 
        $run_statusCheck = $conn -> query ($sql_statusCheck);
        $status_Verified = mysqli_num_rows ($run_statusCheck); //verified

        $sql_statusCheck2 = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND (entry_status = '1' OR entry_status ='') AND (instSup_verifystatus = '0' OR instSup_verifystatus = '')"; 
        $run_statusCheck2 = $conn -> query ($sql_statusCheck2);
        $status_notVerified = mysqli_num_rows ($run_statusCheck2); //not verified
//        $_SESSION ['selected_student'] = ;
        include 'logbook_entry.php';
        }
    }


?>
 </tbody>
</table>

</div>  
</div>
</div>
    <!-- End of div wrapper -->

    <div class="overlay"></div>


<?php
    include '../phpIncludes/footer2.php';


?>