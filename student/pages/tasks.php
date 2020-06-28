<?php
    include '../phpIncludes/header.php';
    $current_userID = $_SESSION ['StudentID'];
    //GET TASKS FROM THE DATABASE
    $sql_taskCheck = "SELECT * FROM task_info WHERE StudentID = '1'"; 
    $run_taskStatus = $conn -> query ($sql_taskCheck);
    $row_tasks = $run_taskStatus -> fetch_assoc();
    $number_tasks = mysqli_num_rows ($run_taskStatus);

    //tasks not done
    $sql_taskCheck_status = "SELECT * FROM task_info WHERE StudentID = '1' AND task_status = '0'"; 
    $run_taskStatus_not = $conn -> query ($sql_taskCheck_status);
    $row_tasks_status = $run_taskStatus_not -> fetch_assoc();
    $number_tasks_notDone = mysqli_num_rows ($run_taskStatus_not);

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-12 col-12 ml-auto mr-auto" >
<!--            style="border: 1px solid #306FA0; border-radius:10px;"-->
             <div class="col-lg-10 col-12 table-responsive mr-auto ml-auto col-mt-5" style="border: 2px solid #17A2B8; border-radius: 15px;">
                               <p style="color:black; font-weight:500;" class="mt-3"> <span id='btn_txt'>TASKS:
                               <button class='ml-3 btn' style='background-color: #6C757D'>
                               
                               <?php
                                   echo"
                               <p style='color:white; font-size:14px;'>".$number_tasks." tasks assigned, ".$number_tasks_notDone." not completed</p>
                               ";?>
                               </button>
                               
                                <table class="table table-hover text-nowrap table-bordered table-striped text-center" style="border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;">
                  <thead style='background-color: #306FA0; color:white; border: 2px solid #306FA0;'>
                    <tr>
<!--                      <th>S/N</th>-->
                      <th><span id='hd_txt'>Task </span></th>
                      <th><span id='hd_txt'>Deadline</span></th>
<!--                      <th>Status</th>-->
                      <th><span id='hd_txt' style=''>Tasks</span></th>
                      <th><span id='hd_txt'>Status</span></th>
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
                        <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/tasks.php';"> View Tasks Page </button>
                           </div>
                            
                        
                            </div>
            
            

        </div>
    </div>    
</div>
</div>
<!--</div>-->
<!--</div>-->

<?php
    include '../phpIncludes/footer2.php';

?>

<!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
-->

    
    </body>
</html>
















