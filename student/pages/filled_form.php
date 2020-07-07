<?php
    echo "
    <form method='post' action='../phpIncludes/logbook_submission.inc.php' enctype='multipart/form-data'>
                <div class='row mt-3' style='font-size:14px;' id='dayinput'>
                
                    <div class='col-lg-2 col-4'>
                        <label for='exampleFormControlTextarea1'>Week Number: </label>

                        <div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle col-lg-9' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='float-left'>".$selected_no."</span>
                            </button>

                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                
                                $current_user = $_SESSION['StudentID'];
                                
                                $week_No = "SELECT ipt_weeks FROM student_info WHERE StudentID = '$current_user'";
                                $res_No = $conn -> query($week_No);
                                $row_No = $res_No -> fetch_assoc();
                                
                                
                                $x = $row_No['ipt_weeks']; //10
                                $y = 1;
                                
                                while ($y <= $x){
                                    //fill status
                                    $fill_status = "SELECT entry_status FROM logbook_entries WHERE weekNumber = $y AND userID = '$current_user'";
                                    $res_status = $conn -> query ($fill_status);
                                    $row_status = $res_status -> fetch_assoc();
                                    
                                    if ($row_status['entry_status'] == '1'){
                                        echo "<a class='dropdown-item' href='?week=".$y."' style='background-color:#5EFF5E;'>".$y."</a>";
                                    }
                                    if ($row_status['entry_status'] != '1'){
                                        echo "<a class='dropdown-item' href='?week=".$y."'>".$y."</a>";
                                    }
                                    
                                    
//                                    echo "<a class='dropdown-item' href='?".$y."'>".$y."</a>";
                                    $y = $y + 1;
                                }
  
                            echo "
                            </div>
                        </div>    
                    </div>
                    
                    
                    <div class='col-lg-3 ml-auto'>
                        <label class='' for='exampleFormControlTextarea1'>Date week starts (Mon): </label>
                        <input placeholder='DATE' type='date' name='startDate' class='form-control' onfocus='(this.type='date')' value='".$getRow['weekStart']."'>
                    </div>
                    
                    <div class='col-lg-3 mr-auto'>
                        <label class='' for='exampleFormControlTextarea1'>Date week ends (Fri or Sat): </label>
                        <input placeholder='DATE' type='date' name='endDate' class='form-control' onfocus='(this.type='date')' value='".$getRow['weekEnds']."'>
                    </div>
                    
                    <style>
                        #dayinput div input{
                            font-size: 14px;
                            border: 1px solid #306FA0
                        }
                        
                        #dayinput div textarea{
                            font-size: 14px;
                            border: 1px solid #306FA0; resize:none;
                        }
                    </style>

                    <div class='col-lg-10 mt-3'>
                        <span title='MONDAY'>
                            <textarea placeholder='Monday Entry' name='monEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['monEntry']."</textarea>
                        <span>
                    </div>

                    <div class='col-lg-10 mt-2'>
                        <span title='TUESDAY'>
                            <textarea placeholder='Tuesday Entry' name='tueEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['tueEntry']."</textarea>
                        </span>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <span title='WEDNESDAY'>
                            <textarea placeholder='Wednesday Entry' name='wedEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['wedEntry']."</textarea>
                        </span>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <span title='THURSDAY'>
                            <textarea placeholder='Thursday Entry' name='thurEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['thurEntry']."</textarea>
                        </span>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <span title='FRIDAY'>
                            <textarea placeholder='Friday Entry' name='friEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['friEntry']."</textarea>
                        </span>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <span title='SATURDAY'>
                            <textarea placeholder='Saturday Entry (Enter &quot;none&quot; if not applicable)' name='satEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['satEntry']."</textarea>
                        </span>
                    </div>                    
                                                
                    <div class='col-lg-2 mt-2 text-center'>
                        <button type='submit' id='upload_btn' class='btn col-lg-10'>
                            UPLOAD </button> <!-- Work on the data-toggle attributes -->
                    </div>
                    
                    
                    <style>
                        div #upload_btn {width:100%; color: white; background-color: #306FA0}
                        
                        div #upload_btn:hover {background-color: #598BB3;}
                    </style>
                    ";
                    
//                    <div class='col-lg-4 mt-2'>
//                        <a href='#' onclick='weekly_visible'> Click Here for Week Entry ><span> </span></a>
//                    </div>
                    echo "
                    <div class='col-lg-12 font-weight-light'>
                        <hr>
                    </div>
                    
                    <div class='col-lg-10 mb-3'>
                        <span title='WEEK ENTRY (PLEASE BE BRIEF AND CLEAR)'>
                            <textarea placeholder='Week Entry' name='week_entry' class='form-control' id='exampleFormControlTextarea1' rows='8' maxlength='1000'>".$getRow['week_Entry']."</textarea>
                        </span>
                    </div>";
?>
                    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                    <div class='col-lg-10'>
                        <div class='input-group'>
                          <div class='input-group-prepend'>
                            <span class='input-group-text' id='inputGroupFileAddon01'>Upload image</span>
                          </div>
                          <div class='custom-file'>
                            <input name='week_img' type='file' class='custom-file-input' id='inputGroupFile01' aria-describedby='inputGroupFileAddon01'>
                            <label class='custom-file-label' for='inputGroupFile01'><span class="">Choose file</span></label>
                          </div>
                        </div>

                    </div>
                    
                    <div id="imgView" class="modal">
                        <div class="modal-content col-lg-6 ml-auto mr-auto" style='border:1px solid #306FA0;'>
                            <span class="close mb-2">&times;</span>
                            
                            <?php
                            echo "
                            <img class='img-responsive' src='logbook_images/".$getRow['week_picture']."' style='width:100%; height:100%; overflow:hidden;'>";
                            
                            ?>
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
                    
                    <div class='col-lg-10 mb-4 mt-2' onclick="img_clicked()">                      
                        <?php
                            echo"
                        <span title='Uploaded image'>
                        <textarea placeholder='Industrial Supervisor Comments (Read Only)' name='field_supComments' class='form-control' id='week_img' rows='3' readonly>".$pic." \n\n(Click to view Previously uploaded image)</textarea>
                        </span>                    
                        ";
                        ?>   
                    </div>
                    
                    <script type="text/javascript"> //Gets the file name only
                        $("#inputGroupFile01").on("change",function(){
                            var fileName = $(this).val().replace('C:\\fakepath\\', " ") + " (Selected image)"; //val() used to return value of attribute for the selected elements
                            $(this).next(".custom-file-label").html(fileName);
                            $(".selected_img").text(fileName);
                        })
                        
                        
                    </script>
                    
                    <?php
                    echo"
                    
                    <div class='col-lg-10 mb-5'>
                        <span title='YOU CAN ONLY VIEW NOT EDIT'>    
                            <textarea placeholder='Industrial Supervisor Comments (Read Only)' name='field_supComments' class='form-control' id='IndSup_comment' rows='2' readonly>".$getRow['indSup_comments']."</textarea>
                        </span>
                    </div>";

                    if ($getRow['indSup_verifystatus'] == 1){
                        echo "
                        <div class='col-lg-2 text-center'>
                        <label style='font-size:13px;'>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='ind_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #28A745; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px; font-size: 13px;' readonly >FS</textarea>
                        </span>";
                    }
                    
                    if ($getRow['indSup_verifystatus'] == 0){
                        echo "
                        <div class='col-lg-2 text-center'>
                        <label style='font-size:13px;'>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='ind_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px; font-size: 13px;' readonly >FS</textarea>
                        </span>";
                    }
                        
                    if ($getRow['instSup_verifystatus'] == 1){
                        echo "
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='inst_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #28A745; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px; font-size: 13px;' readonly>IS</textarea>
                        </span>
                    </div>";
                    }
                            
                    if ($getRow['instSup_verifystatus'] == 0){
                        echo "
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='inst_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px; font-size: 13px;' readonly>IS</textarea>
                        </span>
                    </div>";
                    }

                    echo "
                    </div>
                </div>
            </form>
    
    ";



?>