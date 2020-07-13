<?php

                        $total_students = $_SESSION['total_students'];
                        $get_specific_week = "SELECT * FROM logbook_entries WHERE userID = '$loop3'"; //gets weeks submitted by every individual student
                        $run_query = $conn -> query ($get_specific_week);
                        $run_res = $run_query -> fetch_assoc();
                        
                        $res_num = mysqli_num_rows($run_query);

                        echo "
                        
                        <tr>
                            <td>".$loop3."</td>
                            <td><a href='?".$loop3."'>".$student_row['FirstName']." ".$student_row['LastName']."</a></td>
                            <td>".$res_num."</td>
                            <td>".$status_Verified."</td>
                            <td>".$run_res['last_submission']."</td> 
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
<!--
                           <div class="col-lg-2 ml-auto mr-auto">
                        <button class=" btn btn-success mb-3" onclick="window.location.href='../pages/logbook.php';"> View Logbook Page </button>
                           </div>
-->
                            
                        
                            </div>
                        
                        </div>
                    </div>
                </div>
    

        
