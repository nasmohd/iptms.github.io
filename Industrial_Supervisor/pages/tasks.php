<?php
    include '../phpIncludes/header.php';

    //Shred the URL
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.', $urlComponents[4]); //$urlComponents[4] = logbook.php?1
//    echo ($urlComponents[4]);
    $_SESSION['task_back_url'] = $urlComponents[4];
//                    echo $urlComponents[4]; //logbook.php?2
    $dot_len = count($dot);
    $get_no = explode ('?', $dot[1]); //http://localhost/UNI_3rd_year/student/pages/logbook.php?1
    $len_lastURL = count($get_no); //$get_no = Array ( [0] => php [1] => 1 )
//    print_r ($get_no);
//    echo $len_lastURL;
//    echo $get_no[1];
    
    //NOTES:
    //$get_no = Array ([0] => php [1] => 1), $len_lastURL = 1 if http://localhost/UNI_3rd_year/Industrial_Supervisor/pages/tasks.php?1
    //$get_no = Array ([0] => php), $len_lastURL = 2 if http://localhost/UNI_3rd_year/Industrial_Supervisor/pages/tasks.php?1


    //checks if verify or week has been pressed
    if ($len_lastURL > 1){
        $more_sep = explode ('=', $get_no[1]); //$more_sep = Array ( [0] => week [1] => 1 )
        $res_cnt = count ($more_sep);
        $_SESSION['first'] = $more_sep[0];

        if ($more_sep[0] == 'week'){
            //ERROR
            //http://localhost/UNI_3rd_year%20-%20Copy%20(3)/Industrial_Supervisor/pages/logbook_review.php?1
            $selected_ID = $_SESSION['student_selected'];
            $_SESSION['week_true'] = 1;
            $_SESSION['selected_week'] = $more_sep[1];
            $weekNo = $_SESSION['selected_week'];
            include 'logbook_review.php';
        }

        if ($more_sep[0] == 'verify'){ //http://localhost/UNI_3rd_year/student/pages/logbook.php?request=4
            $selected_student = $_SESSION['student_selected'];
            $testerNo = $more_sep[1];
            $_SESSION['testerNo'] = $testerNo;
            $update_indStatus = "UPDATE logbook_entries SET indSup_verifystatus = '1' WHERE weekNumber ='$testerNo' AND userID = '$selected_student'";
            $run_update = $conn -> query ($update_indStatus);
        }
    }
 
//    echo $selected_student;

    //Get Students that are being supervised
    $current_supervisor = $_SESSION ['IndustrialSup_ID'];
    $supervision_query = "SELECT * FROM supervision_info WHERE industrial_supervisor_ID = '$current_supervisor'";
    $run_supervision = $conn -> query ($supervision_query);
    $supervision_res = $run_supervision -> fetch_assoc();
    $students_supervised = mysqli_num_rows($run_supervision); //$students_supervised = 3
    $_SESSION['total_students'] = $students_supervised;

    if ($len_lastURL < 2){
    echo "
    <div class='' id='content'>
            <div class='container-fluid'>
            <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>
                            
                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;' id='page_content'>
                               <p class='mt-3'><span style='font-size:16px; color:#333333; font-weight:bold;'> STUDENTS UNDER YOUR SUPERVISION <span></p>
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2 mb-5' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>SN</span></th>
                      <th><span id='hd_txt'>Name</span></th>
                      <th><span id='hd_txt'>Tasks Assigned</span></th>

                      <th><span id='hd_txt'>Tasks Done</span></th>
                      <th><span id='hd_txt'>Tasks Not Done</span></th>
                    </tr>
                  </thead>
                  
                   <tbody>
    ";
    }

    if (($len_lastURL >= 2) && ($res_cnt == 1)){ //Triggered when a student is selected    
        echo "
    <div class='' id='content'>
            <div class='container-fluid'>
            <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>

                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;' id='page_content'>";
        $current_userID = $get_no[1];
        $_SESSION['student_selected'] = $current_userID;
        
        $get_name = "SELECT * FROM student_info WHERE StudentID = '$current_userID'";
        $run_name = $conn -> query ($get_name);
        $name_res = $run_name -> fetch_assoc();
        $_SESSION['Selected_FName'] = $name_res['FirstName'];
        $_SESSION['Selected_LName'] = $name_res['LastName'];
    ?>
       
                   <div id="imgView" class="modal">
                        <div class="modal-content col-lg-8 ml-auto mr-auto" style='border:1px solid #306FA0;'>
                            <span class="close mb-2">&times;</span>
                            
                            <div class="container" style="border:1px solid #306FA0; border-radius:5px;">
                            
                               <div class="row">
                               <div class="col-12">
                                <form method="post" action="../phpIncludes/addtasks.inc.php">
                                    <div class='col-lg-4 col-12 mt-3'><label><span style="font-size:13px;">Week Starting:</span></label><input id='task_input' class='form-control' type="date" placeholder="Week Starting" name='week_starting'></div>
                                    <div class='col-lg-4 col-12 mt-1'><label><span style="font-size:13px;">Task Deadline:</span></label><input id='task_input' class='form-control' type="date" placeholder="Deadline" name='deadline'> </div>
                                    <div class='col-12 mt-3'><textarea class='col-12 mt-1 form-control' type="text" id='task_input' placeholder="Task" style='height: 12vh; resize:none;' name='tasks'></textarea></div>
                                    <div class='col-3 mt-2 mb-3 ml-auto mr-auto'><button class='btn btn-success'><span style="font-size:13px;">Add Task </span></button></div>

                                </form>
                                
                                <style>
                                    #task_input {
                                        border: 1px solid #306FA0;
                                        font-size: 14px;
                                    }
                                   
                                </style>
                                </div>
                                </div>
<!--                            </div>-->
                            </div>
                        </div>
                        
                    <style>
                        .modal {
                        border-radius:7px;
                        display: none; /* Hidden by default */
                        position: fixed; /* Stay in place */
                        z-index: 1; /* Sit on top */
                        padding-top: 100px; /* Location of the box */
                        left: 0;
                        top: 0;
                        width: 100%; /* Full width */
                        height: 100%; /* Full height */
                        overflow: auto; /* Enable scroll if needed */
                        background-color: rgb(0,0,0); /* Fallback color */
                        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                        }

                        /* Modal Content */
                        .modal-content {
                        background-color: #fefefe;
                        margin: auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 80%;
                        height: 80%;
                        }

                        /* The Close Button */
                        .close {
                        color: #306FA0;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                        }

                        .close:hover,
                        .close:focus {
                        color: #000;
                        text-decoration: none;
                        cursor: pointer;
                        }
                           
                    </style>
                    
                    <script>
                        var modal = document.getElementById("imgView");

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks the button, open the modal 
                        function img_clicked() {
                            modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                        modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                        if (event.target == modal) {
                        modal.style.display = "none";
                        }
                        }    
                        
                        
                    </script>
                    </div>
       
       <?php
        echo "                  
                <button class='btn btn-primary float-right mt-4 mb-3 col-lg-2 col-3' onclick=\"img_clicked()\"><span style='font-size:14px;'> Add Tasks </span></button>

                <textarea placeholder='Selected Student' name='selection' class='form-control col-lg-3 mt-4' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly style='resize:none; font-size:14px;'>".$_SESSION['Selected_FName']." ".$_SESSION['Selected_LName']."</textarea>

                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2 mb-5' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>Task</span></th>
                      <th><span id='hd_txt'>Deadline</span></th>
                      <th><span id='hd_txt'>Tasks</span></th>

                      <th><span id='hd_txt'>Status</span></th>
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
                               <p> Students Under your Supervision </p>
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center mt-2 mb-5' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>

                      <th><span id='hd_txt'>Week</span></th>
                      <th><span id='hd_txt'>Week Ending</span></th>
                      <th><span id='hd_txt'>Submit Status</span></th>

                      <th><span id='hd_txt'>Industrial Sup</span></th>
                      <th><span id='hd_txt'>Comments</span></th>
                      <th><span id='hd_txt'>Institute Sup</span></th>
                    </tr>
                  </thead> 
    ";
        }
//        echo $testerNo;
    }


    $loop3 = 1;
    while ($loop3 <= $students_supervised){ //$students_supervised = 3
        $supervision_query2 = "SELECT * FROM supervision_info WHERE industrial_supervisor_ID = '$current_supervisor' AND studentID = '$loop3'"; //starts from 1
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
            
            
            //we have filled an entry but it is not verified, INDUSTRIAL SUPERVISOR STATUS
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
            
            
            //Student List (No specific student was selected)
            if ($len_lastURL < 2){
                $total_students = $_SESSION['total_students'];
                        $get_specific_week = "SELECT * FROM task_info WHERE StudentID = '$loop3'"; //gets weeks submitted by every individual student
                        $run_query = $conn -> query ($get_specific_week);
                        $run_res = $run_query -> fetch_assoc();
                        
                        $res_num = mysqli_num_rows($run_query);
                
                        //tasks completed
                        $get_specific_week2 = "SELECT * FROM task_info WHERE StudentID = '$loop3' AND task_status = '1'"; //gets weeks submitted by every individual student
                        $run_query2 = $conn -> query ($get_specific_week2);
                        $run_res2 = $run_query2 -> fetch_assoc();
                        
                        $res_num2 = mysqli_num_rows($run_query2); //tasks completed
                
                        //tasks not completed
                        $get_specific_week3 = "SELECT * FROM task_info WHERE StudentID = '$loop3' AND task_status = '0'"; //gets weeks submitted by every individual student
                        $run_query3 = $conn -> query ($get_specific_week3);
                        $run_res3 = $run_query3 -> fetch_assoc();
                        
                        $res_num3 = mysqli_num_rows($run_query3); //tasks not completed

                        echo "
                        
                        <tr>
                            <td>"."$loop3"."</td>
                            <td><a href='?".$loop3."'>".$student_row['FirstName']." ".$student_row['LastName']."</a></td>
                            <td>".$res_num."</td>
                            <td>".$res_num2."</td>
                            <td>".$res_num3."</td> 
                        </tr>
                        ";
                    ?>
                    
                    <script type='text/javascript'>
                        function select_taskDone(y, z, i){
                        var text_concat = '.done_txt'+z;

                        $(text_concat).text(y);

                        if (y == 'Done'){
                        var btn_concat = '.btn'+z;
                        $(btn_concat).removeClass('btn-danger');
                        $(btn_concat).addClass('btn-success');
                        }

                        if (y == 'Not Done'){
                        var btn_concat = '.btn'+z;
                        $(btn_concat).removeClass('btn-success');
                        $(btn_concat).addClass('btn-danger');
                        }
                        }                 
                    </script>  

                    <style>
                        .table {
                            border: 0.5px solid #000000;
                        }
                        .table-bordered > thead > tr > th,
                        .table-bordered > tbody > tr > th,
                        .table-bordered > tfoot > tr > th,
                        .table-bordered > thead > tr > td,
                        .table-bordered > tbody > tr > td,
                        .table-bordered > tfoot > tr > td {
/*                            border: 0.5px solid #17A2B8;*/
                        }
                        
                        #btn_txt {
                            font-size: 14px;
                        }
                        
                        #hd_txt{
                            font-size: 14px;
                        }
                          
                    </style>
<!--
                           <div class="col-lg-2 ml-auto mr-auto">
                        <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/logbook.php';"> View Logbook Page </button>
                           </div>
-->
                            
                        
                            </div>
                        
                        </div>
                    </div>
                </div>
    

            <?php    
                $_SESSION['pendingStatus'] = '0';
            }
             
    }
        $loop3 = $loop3 + 1; 
    }

    if (($len_lastURL >= 2) && ($res_cnt == 1)){ //Student has been selected
        $current_userID = $get_no[1];
        $_SESSION['student_selected'] = $current_userID;
//        echo $current_userID;
//     $total_students = $_SESSION['total_students'];
                        $get_specific_week = "SELECT * FROM task_info WHERE StudentID = '$current_userID'"; //gets weeks submitted by every individual student
                        $run_query = $conn -> query ($get_specific_week);
                        $run_res = $run_query -> fetch_assoc();
                        
                        $res_num = mysqli_num_rows($run_query);
        
                        
                        $last_task_id = "SELECT MAX(task_id) AS new_id FROM task_info WHERE StudentID = '$current_userID'";
                        $run_last = $conn -> query ($last_task_id);
                        $res_last = $run_last -> fetch_assoc();
//                        echo $res_last['new_id'];
        
                        if ($res_num == 0){
                            echo "<tr>
                            <td>No Tasks Asigned<td>
                            
                            
                            <tr>";
                            
                        }
//<td><a href='?".$loop3."'>".$student_row['FirstName']." ".$student_row['LastName']."</a></td>
                
                
                        $task_loop = 1;
                        $op = 1;
                
                        while ($task_loop <= $res_last['new_id']){
                            $get_each_task = "SELECT * FROM task_info WHERE StudentID = '$current_userID' AND task_id='$task_loop'";
                            $run_get_task = $conn -> query($get_each_task);
                            $get_tasks = $run_get_task -> fetch_assoc();
                            $real_res = mysqli_num_rows ($run_get_task);
                            
                            
                            
                            if ($real_res != 0){ //result present
                                    echo "
                                <tr>
                                    <td>"."$op"."</td>
                                    <td>".$get_tasks['deadline']."</td>
                                    <td style='width: 200px;'><span class='float-left'>".$get_tasks['tasks']."</span></td>
                                ";
//                                 <td>".$get_tasks['task_status']."</td>
                                if ($get_tasks['task_status'] == '0'){
                                    echo "
                                    <form method='post' action='../phpIncludes/addtasks.inc.php?".$task_loop."'>
                                    <td><button class='btn btn-danger'><span style='font-size:13px;'>Not Done </span></button>
                                    <button class='btn btn-danger ml-2' name='delete_task'><span style='font-size:10px;'>X</span></button>
                                    </form>
                                    </td
                                    </tr>
                                    ";
                                }
                                
                                if ($get_tasks['task_status'] == '1'){
                                    echo  "
                                    <form method='post' action='../phpIncludes/addtasks.inc.php?".$task_loop."'>
                                    <td><button class='btn btn-success'><span style='font-size:13px;'> Done </span></button>
                                    <button class='btn btn-danger ml-2' name='delete_task'><span style='font-size:10px;'>X</span></button>
                                    </form>
                                    </td
                                    </tr>
                                    ";
                                }
                                
                                $op = $op + 1;
                            }
                            
                                
                            $task_loop = $task_loop + 1;
                        }
                        
                    ?>
                    
                    <script type='text/javascript'>
                        function select_taskDone(y, z, i){
                        var text_concat = '.done_txt'+z;

                        $(text_concat).text(y);

                        if (y == 'Done'){
                        var btn_concat = '.btn'+z;
                        $(btn_concat).removeClass('btn-danger');
                        $(btn_concat).addClass('btn-success');
                        }

                        if (y == 'Not Done'){
                        var btn_concat = '.btn'+z;
                        $(btn_concat).removeClass('btn-success');
                        $(btn_concat).addClass('btn-danger');
                        }
                        }                 
                    </script>  

                    <style>
                        .table {
                            border: 0.5px solid #000000;
                        }
                        .table-bordered > thead > tr > th,
                        .table-bordered > tbody > tr > th,
                        .table-bordered > tfoot > tr > th,
                        .table-bordered > thead > tr > td,
                        .table-bordered > tbody > tr > td,
                        .table-bordered > tfoot > tr > td {
/*                            border: 0.5px solid #17A2B8;*/
                        }
                        
                        #btn_txt {
                            font-size: 14px;
                        }
                        
                        #hd_txt{
                            font-size: 14px;
                        }
                          
                    </style>

                            </div>
                        
                        </div>
                    </div>
                </div>
    

            <?php    
                
                
                $_SESSION['pendingStatus'] = '0';  
        
        
    }
                        
        echo "
 </tbody>
</table>
<!-- page_content -->
</div>  
</div>
</div>

    <!-- End of div wrapper -->

    <div class='overlay'></div>

";

    include '../phpIncludes/footer2.php';


?>