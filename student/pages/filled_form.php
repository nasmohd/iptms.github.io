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
                                    echo "<a class='dropdown-item' href='?".$y."'>".$y."</a>";
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
                            <textarea placeholder='Saturday Entry' name='satEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'>".$getRow['satEntry']."</textarea>
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
                    </div>
                    
                    <div class='col-lg-10 mb-3'>
                        <div class='input-group'>
                          <div class='input-group-prepend'>
                            <span class='input-group-text' id='inputGroupFileAddon01'>Upload image</span>
                          </div>
                          <div class='custom-file'>
                            <input name='week_img' type='file' class='custom-file-input' id='inputGroupFile01' aria-describedby='inputGroupFileAddon01'>
                            <label class='custom-file-label' for='inputGroupFile01'>Choose file</label>
                          </div>
                        </div>
                    </div>
                    
                    <script> //Gets the file name only
                        $('#inputGroupFile01').on('change',function(){
                            var fileName = $(this).val();
                            $(this).next('.custom-file-label').html(fileName);
                        })
                    </script>
                    
                    <div class='col-lg-10 mb-5'>
                        <span title='YOU CAN ONLY VIEW NOT EDIT'>    
                            <textarea placeholder='Industrial Supervisor Comments (Read Only)' name='field_supComments' class='form-control' id='exampleFormControlTextarea1' rows='2' readonly>".$getRow['indSup_comments']."</textarea>
                        </span>
                    </div>";

                    if ($getRow['indSup_verifystatus'] == 1){
                        echo "
                        <div class='col-lg-2 text-center'>
                        <label>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='ind_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #28A745; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly >FS</textarea>
                        </span>";
                    }
                    
                    if ($getRow['indSup_verifystatus'] == 0){
                        echo "
                        <div class='col-lg-2 text-center'>
                        <label>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='ind_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly >FS</textarea>
                        </span>";
                    }
                        
                    if ($getRow['instSup_verifystatus'] == 1){
                        echo "
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='inst_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #28A745; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly>IS</textarea>
                        </span>
                    </div>";
                    }
                            
                    if ($getRow['instSup_verifystatus'] == 0){
                        echo "
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='inst_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly>IS</textarea>
                        </span>
                    </div>";
                    }

                    echo "
                    </div>
                </div>
            </form>
    
    ";



?>