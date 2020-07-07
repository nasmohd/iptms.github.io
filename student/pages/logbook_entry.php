<?php
    echo "
    <div class='row pr-2'>
                    <div class='col-lg-12 col-12 ml-auto mr-auto mt-4' >
                       
                        <div class='row''>

                            <div class='col-lg-10 col-12 table-responsive ml-auto mr-auto' style='border: 2px solid #17A2B8; border-radius: 15px;'>
                               <p style='color:black; font-weight:500;' class='mt-3'> <span id='btn_txt'>LOGBOOK INFORMATION: </span>
                               <button class='ml-3 btn' style='background-color: #6C757D'>
                               
                               <p style='color:white; font-size:14px;'>".$logbook_number_rows." weeks submitted, ".$status_Verified." weeks verified, ".$status_notVerified." weeks not verified</p>

                               </button>
                               </p>
                                <table class='table table-hover text-nowrap table-bordered table-striped text-center' style='border: 2px solid #306FA0; font-size: 13px; border-radius: 20px;'>
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
                  
                   <tbody>";

                       $loop = 1;
                        $total_weeks = $_SESSION ['ipt_weeks'];
                       while ($loop <= $total_weeks){
                           $get_specific_week = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$loop'";
                           $run_query = $conn -> query ($get_specific_week);
                           $run_res = $run_query -> fetch_assoc();
                           $res_num = mysqli_num_rows($run_query);
                           if ($res_num == 0){
                               echo "<tr><td><a href='?week=".$loop."'>".$loop."</a></td>
                               <td> <span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                               <td> <span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                               <td> <span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                               <td> <span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                               <td> <span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td></tr>
                               ";
                           }else{
//                           <td>".$loop."</td>
                    
                           echo "
                           <tr>
                              
                              <td><a href='?week=".$run_res['weekNumber']."'>".$run_res['weekNumber']."</a></td>
                              <td>".$run_res['weekEnds']."</td>";
                           
                           if ($run_res['entry_status'] == '1'){
                               echo "<td> <span style='font-weight:bold; font-size:16px; color:green;'> &#10003; </span></td>";
                           }
                           
                           
                           if ($run_res['indSup_verifystatus'] == '1'){
                               echo "<td><button class='btn btn-success'><span id='btn_txt'>Verified</span></button></td>";
                               
                           }
                           if (($run_res['indSup_verifystatus'] == '0') || ($run_res['indSup_verifystatus'] == '')) {
                               echo "<td>
                               <div class='dropdown'>
                                    <button class='btn btn-danger dropdown-toggle col-8' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span id='btn_txt' class='float-left'>Not Verified</span>
                                    </button>
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='?request=".$loop."'><span id='btn_txt' onclick='select_taskDone(\"Request\", ".$loop.", r)'>Request verification</span></a>
                                    </div>
                                    </div>
                               
                               </td>";
                               
                           }
                           
                           
                           if ($run_res['indSup_comments'] == ''){
                               echo"<td><button class='btn btn-danger' readonly><span id='btn_txt'>None</span></button></td>";
                               
                           }
                           if ($run_res['indSup_comments'] != ''){
                               echo"<td><button class='btn btn-info' onclick=\"window.location.href='?week=".$run_res['weekNumber']."#IndSup_comment';\"><span id='btn_txt'>View</span></button></td>";
                           }
                           
                           if ($run_res['instSup_verifystatus'] == '1'){
                               echo"<td><button class='btn btn-success'><span id='btn_txt'>Verified</span></button></td>";
                               
                           }
                           
                           if (($run_res['instSup_verifystatus'] == '0') || ($run_res['instSup_verifystatus'] == '')) {
                               echo"<td><button class='btn btn-danger'><span id='btn_txt'>Not verified</span></button></td>";
                               
                           }
                       }
                           $loop = $loop + 1;
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
    

        
