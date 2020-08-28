<?php   
                            $selected_week = $_SESSION['selected_week'];
                            $sql_student = "SELECT * FROM logbook_entries WHERE userID ='$selected_ID' AND weekNumber='$selected_week'";
                            $res = $conn -> query($sql_student);
                            $row4 = $res -> fetch_assoc();

                            $_SESSION ['inst_verify_status'] = $row4['instSup_verifystatus'];
//                            echo $_SESSION ['ind_verify_status'];
//                            echo $row4['weekStart'];
                            
                            echo "
                            <div class='row mt-3' style='font-size:14px;' id='dayinput'>
                    
                    
                    <div class='col-lg-8 pr-4'> 
                        <label for='exampleFormControlTextarea1'>Selected Student: </label>
                        <textarea placeholder='Selected Student' name='selection' class='form-control col-lg-9' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly> ".$_SESSION['SelectedStudent_FName']." ".$_SESSION['SelectedStudent_LName']."</textarea>
                                
                    </div>
                    
                    <div class='col-lg-4'></div>
                    
             
                    <div class='col-lg-2 col-4 mt-3'>
                    <label for='exampleFormControlTextarea1'>Week Number: </label>
                        <div class='dropdown'>                          
                            <button class='btn btn-secondary dropdown-toggle col-lg-9' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class='float-left'>".$selected_week."</span>
                            </button>

                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                
                                $current_user = $selected_ID;
                                
                                $week_No = "SELECT ipt_weeks FROM student_info WHERE StudentID = '$current_user'";
                                $res_No = $conn -> query($week_No);
                                $row_No = $res_No -> fetch_assoc();
                                
                                
                                $x = $row_No['ipt_weeks']; //10
                                $y = 1;
                                
                                while ($y <= $x){
                                    //fill status
                                    $fill_status = "SELECT instSup_verifystatus FROM logbook_entries WHERE weekNumber = $y AND userID = '$current_user'";
                                    $res_status = $conn -> query ($fill_status);
                                    $row_status = $res_status -> fetch_assoc();
                                    
                                    if ($row_status['instSup_verifystatus'] == '1'){
                                        echo "<a class='dropdown-item' href='?week=".$y."' style='background-color:#5EFF5E;'>".$y."</a>";
                                    }
                                    if ($row_status['instSup_verifystatus'] != '1'){
                                        echo "<a class='dropdown-item' href='?week=".$y."'>".$y."</a>";
                                    }
                                    
                                    
//                                    echo "<a class='dropdown-item' href='?".$y."'>".$y."</a>";
                                    $y = $y + 1;
                                }
  
                            echo "
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-lg-3 ml-auto mt-3'>
                        <label class='' for='exampleFormControlTextarea1'>Date the week starts </label>
                        <input placeholder='' name='weekNumber' type='date' name='startDate' class='form-control' style='border: 1px solid #306FA0' readonly value='".$row4['weekStart']."'>
                    </div>
                    
                    <div class='col-lg-3 mr-auto mt-3'>
                        <label class='' for='exampleFormControlTextarea1'>Date the week ends </label>
                        <input placeholder='' name='weekNumber' type='date' name='startDate' class='form-control' style='border: 1px solid #306FA0' readonly value='".$row4['weekEnds']."'>

                    </div>
                    
                    <div>
                    
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
                        <textarea placeholder='Monday Entry' name='monEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly>".$row4['monEntry']."</textarea>
                    </div>
                    
                    <div class='col-lg-2 mt-3'>
                        <textarea name='friEntry' class='col-lg-12 form-control' id='exampleFormControlTextarea1' rows='1' maxlength='10' readonly>".$row4['monhr']."</textarea>
                    </div>

                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Tuesday Entry' name='tueEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly>".$row4['tueEntry']."</textarea>
                    </div>
                    
                    <div class='col-lg-2 mt-2'>
                        <textarea name='friEntry' class='col-lg-12 form-control' id='exampleFormControlTextarea1' rows='1' maxlength='10' readonly>".$row4['tuehr']."</textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Wednesday Entry' name='wedEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly>".$row4['wedEntry']."</textarea>
                    </div>
                    
                    <div class='col-lg-2 mt-2'>
                        <textarea name='friEntry' class='col-lg-12 form-control' id='exampleFormControlTextarea1' rows='1' maxlength='10' readonly>".$row4['wedhr']."</textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Thursday Entry' name='thurEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly>".$row4['thurEntry']."</textarea>
                    </div>
                    
                    <div class='col-lg-2 mt-2'>
                        <textarea name='friEntry' class='col-lg-12 form-control' id='exampleFormControlTextarea1' rows='1' maxlength='10' readonly>".$row4['thurhr']."</textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Friday Entry' name='friEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly>".$row4['friEntry']."</textarea>
                    </div>
                    
                    <div class='col-lg-2 mt-2'>
                        <textarea name='friEntry' class='col-lg-12 form-control' id='exampleFormControlTextarea1' rows='1' maxlength='10' readonly>".$row4['frihr']."</textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Saturday Entry' name='satEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250' readonly>".$row4['satEntry']."</textarea>
                    </div>
                    
                    <div class='col-lg-2 mt-2'>
                        <textarea name='friEntry' class='col-lg-12 form-control' id='exampleFormControlTextarea1' rows='1' maxlength='10' readonly>".$row4['sathr']."</textarea>
                    </div>                    
                                                                
                    <div class='col-lg-10 mt-2 mb-3'>
                        <textarea placeholder='Week Entry' name='week_entry' class='form-control' id='exampleFormControlTextarea1' rows='8' maxlength='1500' readonly>".nl2br($row4['week_Entry'])."</textarea>
                    </div>";

?>                   

                    <div class='col-lg-10 mt-2' onclick="img_clicked()">          
                        <span title='Uploaded image'>
                <?php
                    echo "
                    <a href='#' data-toggle='modal' data-target='#modal-default2'>
                        <textarea placeholder='Weekly Photo' name='field_supComments' class='form-control' id='week_img' rows='3' readonly>".$row4['week_picture']." \n\n(Click to view Previously uploaded image)</textarea></a>
                        </span>                      
                    </div>
                    
    <div class='modal fade pb-5' id='modal-default2' style='height:80vh; overflow-y:auto;'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #306FA0; color:white;'>
              <h5 class='modal-title'>WEEK PHOTO</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                
                <img class='img-responsive' src='../../student/pages/logbook_images/".$row4['week_picture']."' style='width:100%; height:55vh; overflow:auto;'>
                
                
                     
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


                    <div class='col-lg-12 font-weight-light'>
                        <hr>
                    </div>
                    
                    
                    <div class='col-lg-10'>
                        <span title='Share some comments with the student or a word of advice'>
                            <textarea placeholder='Enter your comments here' name='industrial_supComments' class='form-control' id='exampleFormControlTextarea1' rows='2' readonly>".$row4['indSup_comments']."</textarea>
                        </span>
                    </div>";
                            
                    if ($row4['indSup_verifystatus'] == 1){
                        echo "
                        <div class='col-lg-2 text-center'>
                        <label>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='ind_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #28A745; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly >FS</textarea>
                        </span>";
                    }
                    
                    if ($row4['indSup_verifystatus'] == 0){
                        echo "
                        <div class='col-lg-2 text-center'>
                        <label>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='ind_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly >FS</textarea>
                        </span>";
                    }
                        
                    if ($row4['instSup_verifystatus'] == 1){
                        echo "
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='inst_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #28A745; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly>IS</textarea>
                        </span>
                    </div>";
                    }
                            
                    if ($row4['instSup_verifystatus'] == 0){
                        echo "
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='inst_sup_status' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly>IS</textarea>
                        </span>
                    </div>";
                    }
                    
                    if ($_SESSION ['inst_verify_status'] == 1){
                        echo "
                        <div class='col-lg-12 mt-2 mb-3'>
                        <div class='form-check'>
                            <label class='form-check-label' for='exampleCheck1' style='color: green; font-weight: bold;'><span style='font-size: 18px;' class='mr-2'>&#10003;</span>Already Verified</label>
                        </div>
                    </div>
                        ";
                    }else {
                        echo "
                    <div class='col-lg-12 mt-2 mb-3'>
                        <div class='form-check'>
                            <input type='checkbox' name='check_verifyStatus' class='form-check-input' id='exampleCheck1'>
                            <label class='form-check-label' for='exampleCheck1'>Check the box to verify these entries</label>
                        </div>
                    </div>";
                    }

                    echo "
                    <div class='col-lg-5 mt-3 text-center mb-3 ml-auto mr-auto'>
                        <span title='Click this button if verification is done'>
                            <button type='submit' class='btn btn-success col-lg-5' name='daily_upload' style='width:100%; color: white;'>
                            UPDATE DATA ... </button>
                        </span>
                    </div>

                </div>
            </form>";        




?>