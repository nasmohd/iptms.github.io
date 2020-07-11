<?php
    include '../phpIncludes/header.php';
    $current_userID = $_SESSION ['StudentID'];

    if (isset($_GET['status'])){
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);
//        echo $urlComponents[4]; //tasks.php?status=f#1

        
    $dot = explode ('status=', $urlComponents[4]);
    $f_or_t = explode ('.', $dot[1]); //$dot[1] = f, 1 or t, 1
    $use_taskID = $f_or_t[1];
    if ($f_or_t[0] == 't'){ //task set to "Done"
        $update_tasks = "UPDATE task_info SET task_status = '1' WHERE task_id = '$use_taskID'";
        $run_taskUpdate = $conn -> query ($update_tasks);
        
    }

    if ($f_or_t[0] == 'f'){ //task set to "Not Done"
        $update_tasks2 = "UPDATE task_info SET task_status = '0' WHERE task_id = '$use_taskID'";
        $run_taskUpdate2 = $conn -> query ($update_tasks2);   
    }
}

    //GET TASKS FROM THE DATABASE
    $sql_taskCheck = "SELECT * FROM task_info WHERE StudentID = '$current_userID'"; 
    $run_taskStatus = $conn -> query ($sql_taskCheck);
    $row_tasks = $run_taskStatus -> fetch_assoc();
    $number_tasks = mysqli_num_rows ($run_taskStatus);

    //tasks not done
    $sql_taskCheck_status = "SELECT * FROM task_info WHERE StudentID = '$current_userID' AND task_status = '0'"; 
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
                            <div class="row"><div class="col-lg-6">
                            <p style="color:black; font-weight:500;" class="mt-3"> <span id='btn_txt'>TASKS: </span>
                               <button class='ml-3 btn' style='background-color: #6C757D'>
                               
                               <?php
                                   echo"
                               <p style='color:white; font-size:14px;'>".$number_tasks." tasks assigned, ".$number_tasks_notDone." tasks not completed</p>
                               ";?>
                               </button></p>
                                 </div>
                               
                               <div class='col-2 dropdown mt-4 ml-auto'>
                                    <button class='btn btn-info dropdown-toggle col-10' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span id='btn_txt' class='select_taskView float-left'>All</span>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='#' onclick="item_val('All')"><span id='btn_txt'>All</span></a>
                                    <a class='dropdown-item' href='#' onclick="item_val('Done')"><span id='btn_txt'>Done</span></a>
                                    <a class='dropdown-item' href='#' onclick="item_val('Not Done')"><span id='btn_txt'>Not Done</span></a>
                                    </div>
                                </div>
                                
                                <script type="text/javascript"> 
                                    function item_val(x){
                                        $('.select_taskView').text(x);
                                    }

                                </script> 
                            </div>
                               
                               <form method="post" action="../phpIncludes/task_submit.inc.php">
                                <table class="table table-hover text-nowrap table-bordered table-striped " style="border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;">
                  <thead style='background-color: #306FA0; color:white; border: 2px solid #306FA0;'>
                    <tr class='text-center'>
<!--                      <th>S/N</th>-->
                      <th><span id='hd_txt'>Task </span></th>
                      <th><span id='hd_txt'>Deadline</span></th>
<!--                      <th>Status</th>-->
                      <th><span id='hd_txt'>Tasks</span></th>
                      <th><span id='hd_txt'>Status</span></th>
                    </tr>
                  </thead>
                  
                  <script type="text/javascript">
                    var selected_task = [];                
                                        
                </script>
                  
                   <tbody> <!-- table body begins here, <tr> tag then <td> tag-->
                   <?php
                       $loop2 = 1;
                       $show = 0;
                       $selected_tasks = [];
//                       $number_tasks
                       
                       
                       
//$row_tasks        
                       while ($loop2 <= $number_tasks){
                           $get_task = "SELECT * FROM task_info WHERE StudentID = '$current_userID' AND task_id ='$loop2'";
                           $run_task_query = $conn -> query ($get_task);
                           $res_tasks = $run_task_query -> fetch_assoc();
                           
                           $get_task2 = "SELECT deadline FROM task_info WHERE StudentID = '$current_userID' AND task_id ='$loop2'";
                           $run_task_query2 = $conn -> query ($get_task2);
                           $res_tasks2 = $run_task_query2 -> fetch_assoc();

                           echo "
                           <tr>
                              
                              <td class='text-center'>".$loop2."</td>
                              <td class='text-center'>".$res_tasks['deadline']."</td>"
//                              <td>".$res_tasks['tasks']."</td>"
                               ;
                           
                           if ((strlen($res_tasks['tasks'])) < 30){
                               echo "<td>".$res_tasks['tasks']."</td>";
                           }else {
                               
                               echo "<td style='width: 200px; '>".$res_tasks['tasks']."</td>";
                           }

                           
                           if ($res_tasks['task_status'] == '1'){
//                               echo "<td><button class='btn btn-success'><span id='btn_txt'>Done</span></button></td>";   
                               echo "<td class='text-center'>
                               <div class='dropdown'>
                                    <button class='btn btn-success dropdown-toggle btn".$loop2." col-6' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span id='btn_txt' class='done_txt".$loop2." mr-3' name='done_txt?".$loop2."'> Done</span>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton' id='btn".$loop2."'>
                                    <a class='dropdown-item' href='?status=t.".$loop2."#btn".$loop2."' onclick='select_taskDone2(\"Done\", ".$loop2.", ".$res_tasks['task_id'].", t)'><span id='btn_txt'>Done</span></a>
                                    <a class='dropdown-item' href='?status=f.".$loop2."#btn".$loop2."' onclick='select_taskDone2(\"Not Done\", ".$loop2.", ". $res_tasks['task_id'].", f)'><span id='btn_txt'>Not Done</span></a> </div></div></td>                    
                               ";   
                           }
                           
                           if (($res_tasks['task_status'] == '0') || ($res_tasks['task_status'] == '')) {
                               echo "<td class='text-center'>
                               <div class='dropdown'>
                                    <button class='btn btn-danger dropdown-toggle btn".$loop2." col-6' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span id='btn_txt' class='done_txt".$loop2." mr-3' name='done_txt?".$loop2."'>Not Done</span>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton' id='btn".$loop2."'>
                                    <a class='dropdown-item' href='?status=t.".$loop2."#btn".$loop2."' onclick='select_taskDone(\"Done\", ".$loop2.", ".$res_tasks['task_id'].", t)'><span id='btn_txt'>Done</span></a>
                                    <a class='dropdown-item' href='?status=f.".$loop2."#btn".$loop2."' onclick='select_taskDone(\"Not Done\", ".$loop2.", ". $res_tasks['task_id'].", f)'><span id='btn_txt'>Not Done</span></a>                   
                                    ";
                               ?>
<!--
    <a class='dropdown-item' href='#' onclick='select_taskDone("Done", 1)'><span id='btn_txt'>Done</span></a>
                                    <a class='dropdown-item' href='#' onclick='select_taskDone("Not Done", 1)'><span id='btn_txt'>Not Done</span></a>
-->
                                                                        
                        <?php
                               echo"
                                    </div>
                                    </div>
                               
                               </td>
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
                               ";  
                           }
                           
                           
                           $loop2 = $loop2 + 1;
                           $show = $show + 1;
                       }
//                       $_SESSION ['selected_tasks'] = $selected_tasks;
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
                        <?php
                                   if ($number_tasks == '0'){
                           echo "No tasks Assigned for you";
                           
                           
                       }
                                   ?>
                         
<!--
                           <div class="col-lg-2 ml-auto mr-auto">
                        <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/tasks.php';"> SUBMIT </button>
                           </div>
-->
                            
                 </form>
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
















