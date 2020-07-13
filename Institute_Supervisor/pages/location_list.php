<?php
                        $total_students = $_SESSION['total_students'];
                        $get_specific_week = "SELECT * FROM student_location_info WHERE studentID = '$loop3'"; //gets weeks submitted by every individual student
                        $run_query = $conn -> query ($get_specific_week);
                        $run_res = $run_query -> fetch_assoc();
                        
                        $res_num = mysqli_num_rows($run_query);
//                        echo $res_num;
                        
                        if ($res_num == 0){ //no results/records present
                            echo "
                            <tr>
                            <td>".$loop3."</td>
                            <td>".$student_row['FirstName']." ".$student_row['LastName']."</td>
                            <td><span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                            <td><span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                            <td><span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                            <td><span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td> 
                            <td><span style='font-weight:bold; font-size:16px; color:red;'>  &#x274C; </span></td>
                            </tr>
                            ";
                            
                            
                        }
                        if ($res_num == 1) { //results found
                        echo "
                        <tr>
                            <td>".$loop3."</td>
                            <td>".$student_row['FirstName']." ".$student_row['LastName']."</td>
                            <td>".$run_res['CompanyName']."</td>
                            <td>".$run_res['CompanyAddress']."</td>
                            <td>".$run_res['LocationDescription']."</td> 
                            <td><button class='btn btn-info' onclick=\"img_clicked(".$run_res['locationCoord'].")\"> <span style='font-size:13px;'> View Map </span></button></td>";
                            
                        if ($run_res['institute_supervision_status'] == '0'){
                            echo "
                            <td>
                            <div class='dropdown'>
                                    <button class='btn btn-danger dropdown-toggle btn".$loop3." col-11' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    <span id='btn_txt' class='done_txt".$loop3." float-left mr-4' name='done_txt?".$loop3."'> Not Assessed</span>
                                    </button>
                                    
                                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton' id='btn".$loop3."'>
                                    <a class='dropdown-item' href='?".$loop3."'><span id='btn_txt'>Assessed</span></a>
                                    </div>
                            </div>
                            
                            </td>
                            </tr>
                            ";
                        }
                            
                        if ($run_res['institute_supervision_status'] == '1'){
                            echo "
                            <td><button class='btn btn-success'><span style='font-size:13px;'>Assessed </span></button></td>
                            </tr>
                            ";
                        }
                        }
                    ?>
                    
                    
                    <div id="imgView" class="modal">
                        <div class="modal-content col-lg-6 ml-auto mr-auto" style='border:1px solid #306FA0;'>
                            <span class="close mb-2">&times;</span>
                            <div id="map" class="mt-3" style="border: 1px solid #306FA0">
                                <div class="mapouter">
                                  
                                   <div class='gmap_canvas'>
                                           <iframe width='600' height='400' id='gmap_canvas' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                    </div>
                                    <?php

//                                            $separate_loc = explode (', ', $run_res['locationCoord']);
//                                            $lat = $separate_loc[0];
//                                            $lon = $separate_loc[1];
//                                            echo $lon;
//                                        echo "
//                                            <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=".$lat."%2C%20".$lon."&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
//                                            </div>
//                                        ";                                  
                                    ?>

                                    <style>
                                        .mapouter{position:relative;}
                                        .gmap_canvas {overflow:hidden;background:none!important;}
                                    </style>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                    <style>
                        .modal {
                        border-radius:7px;
                        display: none; /* Hidden by default */
                        position: fixed; /* Stay in place */
                        z-index: 1; /* Sit on top */
/*                        padding-top: 100px;  Location of the box */
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
/*                        margin: auto;*/
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
                        function img_clicked(x, y) {
                            modal.style.display = "block";
                            var ifrm = document.getElementById("gmap_canvas");
                            ifrm.src = "https://maps.google.com/maps?q=" + x + "%2C%20" + y + "&t=&z=13&ie=UTF8&iwloc=&output=embed";
//                            src='https://maps.google.com/maps?q=".$lat."%2C%20".$lon."&t=&z=13&ie=UTF8&iwloc=&output=embed'
//                            alert (x + " " + y);
                            
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
    

        
