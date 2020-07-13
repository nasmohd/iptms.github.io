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
    
    //http://localhost/UNI_3rd_year/student/pages/logbook.php?request=4

 
//    echo $selected_student;

    //Get Students that are being supervised
    $current_supervisor = $_SESSION ['InstituteSup_ID'];
    $supervision_query = "SELECT * FROM supervision_info WHERE institute_supervisor_ID = '$current_supervisor'";
    $run_supervision = $conn -> query ($supervision_query);
    $supervision_res = $run_supervision -> fetch_assoc();
    $students_supervised = mysqli_num_rows($run_supervision); //$students_supervised = 4
    $_SESSION['total_students'] = $students_supervised;

//    if ($len_lastURL <= 2){
    echo "
    <div class='' id='content'>
            <div class='container-fluid'>
            <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>

                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;' id='page_content'>
                               <p class='mt-3'><span style='font-size:16px; color:#333333; font-weight:bold;'> STUDENTS UNDER YOUR SUPERVISION <span></p>
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;' onload=\"myFunction()\">
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>SN</span></th>
                      <th><span id='hd_txt'>Name</span></th>
                      <th><span id='hd_txt'>Company Name</span></th>

                      <th><span id='hd_txt'>Company Address</span></th>
                      
                      <th><span id='hd_txt'>Location Description</span></th>
                      <th><span id='hd_txt'>View Map</span></th>
                      <th><span id='hd_txt'>Status</span></th>
                    </tr>
                  </thead>
                  
                   <tbody>
    ";
    


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
            $sql_statusCheck = "SELECT * FROM logbook_entries WHERE userID = '$loop3' AND indSup_verifystatus = '1' AND entry_status = '1'"; 
            $run_statusCheck = $conn -> query ($sql_statusCheck);
            $status_Verified = mysqli_num_rows ($run_statusCheck); //verified

            $sql_statusCheck2 = "SELECT * FROM logbook_entries WHERE userID = '$loop3' AND entry_status = '1' OR entry_status ='' AND (indSup_verifystatus = '0' OR indSup_verifystatus = '')"; 
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
//            if ($len_lastURL <= 2){
                include 'location_list.php';
                $_SESSION['pendingStatus'] = '0';
//            }
             
    }
        $loop3 = $loop3 + 1; 
    }

//    }

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