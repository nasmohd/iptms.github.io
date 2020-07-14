<?php
    include '../phpIncludes/header.php';
//    $current_userID = $_SESSION ['StudentID'];
    $sup_ID = $_SESSION ['IndustrialSup_ID'];

    $getSup_students = "SELECT * FROM supervision_info WHERE institute_supervisor_ID = '$sup_ID'";
    $run_getSup_students = $conn -> query ($getSup_students);
    $total_getSup_students = mysqli_num_rows($run_getSup_students);
    
    $largest_getSup_students = "SELECT MAX(id) AS new_Supid FROM supervision_info WHERE institute_supervisor_ID = '$sup_ID'";
    $run_largest_getSup_students = $conn -> query ($largest_getSup_students);
    $total_largest = mysqli_num_rows($run_largest_getSup_students);
    echo ($total_largest);
    
    $sql_logbook = "SELECT * FROM logbook_entries WHERE userID = '$current_userID'";
    $run = $conn -> query($sql_logbook);
    $logbook_number_rows = mysqli_num_rows ($run);
//echo $logbook_rows;
    $logbook_row = $run -> fetch_assoc();

    //we have filled an entry but it is not verified
    $sql_statusCheck = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND indSup_verifystatus = '0' OR indSup_verifystatus = '' AND entry_status = '1'"; 
    $run_statusCheck = $conn -> query ($sql_statusCheck);
    $status_notVerified = mysqli_num_rows ($run_statusCheck); //not verified

    
    //GET TASKS FROM THE DATABASE
    $sql_taskCheck = "SELECT * FROM task_info WHERE StudentID = '$current_userID'"; 
    $run_taskStatus = $conn -> query ($sql_taskCheck);
    $row_tasks = $run_taskStatus -> fetch_assoc();
    $number_tasks = mysqli_num_rows ($run_taskStatus);

    //tasks not done
    $sql_taskCheck_status = "SELECT * FROM task_info WHERE StudentID = '$current_userID' AND task_status = '0'"; 
    $run_taskStatus_not = $conn -> query ($sql_taskCheck_status);
    $row_tasks_status = $run_taskStatus_not -> fetch_assoc();
    $number_tasks_notDone = mysqli_num_rows ($run_taskStatus_not); //get the number of tasks, 3


?>
        <div class='' id="content">
            <div class="container-fluid">
                <div class="row pr-2">
                    <div class="col-lg-12 col-12 ml-auto mr-auto" >
                       
                        <div class="row">
                            <div class="col-lg-12 ml-auto mt-3">
                            <p class="ml-lg-3" style="font-size: 25px; font-weight: bold; color:#343A40;">Dashboard </p>
                            </div>
                           <!-- change the col-lg below to change the table size -->
                            <div class="col-lg-6 col-12 table-responsive ml-auto mr-auto" style="border: 2px solid #17A2B8; border-radius: 15px;">
                               <p style="color:black; font-weight:500;" class="mt-3"> <span id='btn_txt'>LOGBOOK INFORMATION </span>
                               
                               </p>
                                <table class="table table-hover text-nowrap table-bordered table-striped text-center" style="border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;">
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>
<!--                      <th>S/N</th>-->
                      <th><span id='hd_txt'>SN</span></th>
                      <th><span id='hd_txt'>Name</span></th>
<!--                      <th>Status</th>-->
<!--                      <th><span id='hd_txt'>Weeks Submitted</span></th>-->
                      <th><span id='hd_txt'>Weeks Not Verified</span></th>
<!--                      <th><span id='hd_txt'>Institute Sup</span></th>-->
                    </tr>
                  </thead>
                  
                   <tbody> <!-- table body begins here, <tr> tag then <td> tag-->
                   <?php
                       $loop = 1;
                       while ($loop <= $logbook_number_rows){
                           $get_specific_week = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$loop'";
                           $run_query = $conn -> query ($get_specific_week);
                           $run_res = $run_query -> fetch_assoc();
//                           <td>".$loop."</td>
                           echo "
                           <tr>
                              
                              <td>".$run_res['weekNumber']."</td>
                              <td>".$run_res['weekEnds']."</td>";
                           if ($run_res['indSup_verifystatus'] == '1'){
                               echo "<td><button class='btn btn-success'><span id='btn_txt'>Verified</span></button></td>";
                               
                           }
                           if (($run_res['indSup_verifystatus'] == '0') || ($run_res['indSup_verifystatus'] == '')) {
                               echo "<td><button class='btn btn-danger'><span id='btn_txt'>Not verified</span></button></td>";
//                               <div class='dropdown'>
//                                    <button class='btn btn-danger dropdown-toggle col-10' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
//                                    <span id='btn_txt' class='float-left'>Waiting</span>
//                                    </button>
//                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
//                                    <a class='dropdown-item' href='#'><span id='btn_txt'>Request verification</span></a>
//                                    </div>
//                                    </div>
//                               
//                               </td>";
                               
                           }
                           
                           
                           if ($run_res['indSup_comments'] == ''){
                               echo"<td><button class='btn btn-danger' readonly><span id='btn_txt'>None</span></button></td>";
                               
                           }
                           if ($run_res['indSup_comments'] != ''){
                               echo"<td><button class='btn btn-info'><span id='btn_txt'>View</span></button></td>";
                           }
                           
                           if ($run_res['instSup_verifystatus'] == '1'){
                               echo"<td><button class='btn btn-success'><span id='btn_txt'>Verified</span></button></td>";
                               
                           }
                           
                           if (($run_res['instSup_verifystatus'] == '0') || ($run_res['instSup_verifystatus'] == '')) {
                               echo"<td><button class='btn btn-danger'><span id='btn_txt'>Not verified</span></button></td>";
                               
                           }

                           $loop = $loop + 1;
                       }
                    ?>
                   
<!--
                    <tr>
                      <td>1</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><button class="btn btn-success">Approved</button></td>
                      <td><button class="btn btn-info"> View comments </button></td>
                      <td><button class="btn btn-danger">Not Approved</button> </td>
                    </tr>
-->
                    
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
                    
                  </tbody>
                </table>
                           <div class="col-lg-2 ml-auto mr-auto">
                        <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/logbook.php';"><span style="font-size:13px;">View Logbook Page </span></button>
                           </div>
                            
                        
                            </div>
                            
                    <!-- TASKS TABLE -->  
                        <div class="col-lg-5 col-12 table-responsive mr-auto ml-auto col-mt-5" style="border: 2px solid #17A2B8; border-radius: 15px;">
                               <p style="color:black; font-weight:500;" class="mt-3"> <span id='btn_txt'>TASK INFORMATION
                               
                               
                                <table class="table table-hover text-nowrap table-bordered table-striped text-center" style="border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;">
                  <thead style='background-color: #306FA0; color:white; border: 2px solid #306FA0;'>
                    <tr>
<!--                      <th>S/N</th>-->
                      <th><span id='hd_txt'>SN </span></th>
                      <th><span id='hd_txt'>Name</span></th>
<!--                      <th>Status</th>-->
                      <th><span id='hd_txt' style=''>Tasks Assigned</span></th>
<!--                      <th><span id='hd_txt'>Status</span></th>-->
                    </tr>
                  </thead>
                  
                   <tbody> <!-- table body begins here, <tr> tag then <td> tag-->
                   <?php
                       $loop2 = 1;
                       $show = 0;
//                       $number_tasks
//$row_tasks
                       while ($loop2 <= $number_tasks){
                           $get_task = "SELECT * FROM task_info WHERE StudentID = '$current_userID' AND task_id ='$loop2' ORDER BY deadline";
                           $run_task_query = $conn -> query ($get_task);
                           $res_tasks = $run_task_query -> fetch_assoc();
//                           print_r ($res_tasks);
                           //task_id, week, deadline, tasks, task_status
//                           <td>".$loop."</td>
                           echo "
                           <tr>
                              
                              <td>".$loop2."</td>
                              <td>".$res_tasks['deadline']."</td>"
//                              <td>".$res_tasks['tasks']."</td>"
                               ;
                           
                           if ((strlen($res_tasks['tasks'])) < 30){
                               echo "<td>".$res_tasks['tasks']."</td>";
                           }else {
                               
                               echo "<td style='width: 200px; overflow:hidden; display:inline-block; text-overflow: ellipsis; white-space: nowrap;'>".$res_tasks['tasks']."</td>";
                           }

                           
                           if ($res_tasks['task_status'] == '1'){
                               echo "<td><button class='btn btn-success'><span id='btn_txt'>Done</span></button></td>";   
                           }
                           
                           if (($res_tasks['task_status'] == '0') || ($res_tasks['task_status'] == '')) {
                               echo "<td>
                               <button class='btn btn-danger'><span id='btn_txt'>Waiting</span></button>
                               
                               </td>";  
                           }
                           
                           
                           $loop2 = $loop2 + 1;
                           $show = $show + 1;
                       }
                    ?>
                   
<!--
                    <tr>
                      <td>1</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><button class="btn btn-success">Approved</button></td>
                      <td><button class="btn btn-info"> View comments </button></td>
                      <td><button class="btn btn-danger">Not Approved</button> </td>
                    </tr>
-->
                    
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
                        
                        @media (min-width: 992px){
                            #task_toggle .dropdown-toggle{
                            margin-right: -20px;
                        } 
                        }
                        
                          
                    </style>
                    
                  </tbody>
                </table>
                         
                           <div class="col-lg-2 ml-auto mr-auto">
                               <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/tasks.php';"><span style="font-size:13px;">View Tasks Page </span></button>
                           </div>
                            
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <!-- End of div wrapper -->

    <div class="overlay"></div>


<?php
    include '../phpIncludes/footer2.php';


?>