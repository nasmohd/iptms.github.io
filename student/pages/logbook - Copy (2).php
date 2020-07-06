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
    $get_no = explode ('?', $dot[1]);

    if ($dot[1] == 'php'){
        echo "
        
        
        
        ";
    }
    else {
        $current_userID = $_SESSION ['StudentID'];
        $selected_no = $get_no[1];
        $_SESSION['student_weekSelection'] = $selected_no;
        $getEntries = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$selected_no'";
        $getRes = $conn -> query($getEntries);
        $getRow = $getRes -> fetch_assoc();
        echo "
        <div class='container-fluid'>
        <div class='row mt-4'>
        <div class='col-lg-8 col-12 ml-auto mr-auto' style='border: 1px solid #306FA0; border-radius:10px;'>
        ";
        
        
        include 'filled_form.php';
        echo "
               </div>
    </div>    
</div>
        ";
    }

//    if ($dot[1] != 'php'){
//        $get_no = explode ('?', $dot[1]);
//        $current_userID = $_SESSION ['StudentID'];
//        $selected_no = $get_no[1];
//        $_SESSION['student_weekSelection'] = $selected_no;
//        $getEntries = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$selected_no'";
//        $getRes = $conn -> query($getEntries);
//        $getRow = $getRes -> fetch_assoc();
//    }
//                    echo $dot[1][4]; //shows the number selected
    
//    print_r ($get_no);
//    if ($get_no[1] == )



?>
        <div class='' id="content">
            <div class="container-fluid">
               <?php
                echo "
                    
                
                ";
                ?>
               
               
               
                <div class="row pr-2">
                    <div class="col-lg-12 col-12 ml-auto mr-auto mt-4" >
                       
                        <div class="row">

                           <!-- change the col-lg below to change the table size -->
                            <div class="col-lg-10 col-12 table-responsive ml-auto mr-auto" style="border: 2px solid #17A2B8; border-radius: 15px;">
                               <p style="color:black; font-weight:500;" class="mt-3"> <span id='btn_txt'>LOGBOOK INFORMATION: </span>
                               <button class='ml-3 btn' style='background-color: #6C757D'>
                               
                               <?php
                                   echo"
                               <p style='color:white; font-size:14px;'>".$logbook_number_rows." weeks submitted, ".$status_Verified." weeks verified, ".$status_notVerified." weeks not verified</p>
                               
                               ";?>
<!--                               <p style='color:white;'>X weeks verified</p>-->
                               </button>
                               </p>
                                <table class="table table-hover text-nowrap table-bordered table-striped text-center" style="border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;">
                  <thead style='background-color: #306FA0; color:white;'>
                    <tr>
<!--                      <th>S/N</th>-->
                      <th><span id='hd_txt'>Week</span></th>
                      <th><span id='hd_txt'>Week Ending</span></th>
<!--                      <th>Status</th>-->
                      <th><span id='hd_txt'>Industrial Sup</span></th>
                      <th><span id='hd_txt'>Comments</span></th>
                      <th><span id='hd_txt'>Institute Sup</span></th>
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
                              
                              <td><a href='?".$run_res['weekNumber']."'>".$run_res['weekNumber']."</a></td>
                              <td>".$run_res['weekEnds']."</td>";
                           if ($run_res['indSup_verifystatus'] == '1'){
                               echo "<td><button class='btn btn-success'><span id='btn_txt'>Verified</span></button></td>";
                               
                           }
                           if (($run_res['indSup_verifystatus'] == '0') || ($run_res['indSup_verifystatus'] == '')) {
                               echo "<td>
                               <div class='dropdown'>
                                    <button class='btn btn-danger dropdown-toggle col-7' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span id='btn_txt' class='float-left'>Not Verified</span>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='#'><span id='btn_txt'>Request verification</span></a>
                                    </div>
                                    </div>
                               
                               </td>";
                               
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
<!--
                           <div class="col-lg-2 ml-auto mr-auto">
                        <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/logbook.php';"> View Logbook Page </button>
                           </div>
-->
                            
                        
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