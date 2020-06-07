<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-9 col-12 ml-auto mr-auto" style="border: 1px solid #306FA0; border-radius:10px;">
            
            <?php
                    $requestUrl = $_SERVER ['REQUEST_URI'];
                    $urlComponents = explode ('/', $requestUrl);
                     
                    $dot = explode ('.', $urlComponents[4]);
//                    echo $urlComponents[4];
                    $dot_len = count($dot);
//                    echo $dot[1][4]; //shows the number selected
                    
                    if ($dot[1])
                    
                    if ($dot_len > 1){
                        $lenurl = strlen($dot[1]);
//                        echo $lenurl;
                        $last = $lenurl - 1;
                        $selected_ID = $dot[1][$last]; //ID selected to view logbook data about
                        
                        if (($lenurl >3) && ($dot[1][$last-1] == '?')){
                            $sql_student = "SELECT * FROM logbook_entries WHERE userID ='$selected_ID'";
                            $res = $conn -> query($sql_student);
                            $row4 = $res -> fetch_assoc();
//                            echo $row4['weekStart'];
                            
                            echo "";
                    }
                        }
            
            //http://localhost/UNI_3rd_year/Industrial_Supervisor/pages/logbook_review.php#3
            ?>
            
            
            
            <form method='post' action='../phpIncludes/logbook_submission.inc.php'>
                <div class='row mt-3' style='font-size:14px;' id='dayinput'>
                    <div class='col-lg-12 col-4 mb-3'>
                        <label for='exampleFormControlTextarea1'>Select a Student: </label>
                        <div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Pick anyone
                            </button>
                            
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <?php
                                    $userSession = $_SESSION['IndustrialSup_ID'];
                                    
//                                    $sqllist = "SELECT * FROM supervision_info WHERE institute_supervisor_ID = '$userSession'";
                                    $sqllist = "SELECT * FROM supervision_info WHERE industrial_supervisor_ID = '$userSession'"; //2, how many students
                                    
                                    $resultSup = $conn -> query($sqllist);
//                                    $rowList = $resultSup -> fetch_assoc(); //$rowList['cols] = 3
                                    
                                    while ($rowList = $resultSup -> fetch_assoc()){
                                        $student_ID = $rowList['studentID'];
                                        $sqlStudent = "SELECT * FROM student_info WHERE StudentID = '$student_ID'";
                                        $res_students = $conn -> query($sqlStudent);
                                        
                                        while ($row_students = $res_students -> fetch_assoc()){
                                            echo "<a class='dropdown-item' href='?".$row_students['StudentID']."'>".$row_students['FirstName']." ".$row_students['LastName']."</a>";
                                        }
                                    }                         
                                ?>

                            </div>
                        </div> 
                    </div>                    
                    
                    <div class="col-lg-2 col-4">
                        <label for="exampleFormControlTextarea1">Week Number: </label>
                        <input placeholder="Week 1 to 10" name="weekNumber" type="text" id="weekinput" class="form-control" style=" border: 1px solid #306FA0" readonly>  
                    </div>
                    
                    <div class="col-lg-3 ml-auto">
                        <label class="" for="exampleFormControlTextarea1">Date the week starts </label>
<!--                        <textarea name="startDate" readonly></textarea>-->
                        <input placeholder="" name="weekNumber" type="text" name="startDate" class="form-control" style=" border: 1px solid #306FA0" readonly>

<!--                        <input placeholder="DATE" type="text" name="startDate" class="form-control" onfocus="(this.type='date')">-->
                    </div>
                    
                    <div class="col-lg-3 mr-auto">
                        <label class="" for="exampleFormControlTextarea1">Date the week ends </label>
<!--                        <textarea name="endDate" readonly></textarea>-->
                        <input placeholder="" name="weekNumber" type="text" name="endDate" class="form-control" style=" border: 1px solid #306FA0" readonly>
<!--                        <input placeholder="DATE" type="text" name="endDate" class="form-control" onfocus="(this.type='date')">-->
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

                    <div class="col-lg-10 mt-3">
                        <textarea placeholder="Monday Entry" name="monEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250" readonly></textarea>
                    </div>
                    
<!--
                    <div class="col-lg-3 col-6 mr-auto">
                        <input placeholder="DATE" type="text" name="monDate" class="form-control" onfocus="(this.type='date')">
                    </div>
--> 
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Tuesday Entry" name="tueEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250" readonly></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Wednesday Entry" name="wedEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250" readonly></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Thursday Entry" name="thurEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250" readonly></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Friday Entry" name="friEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250" readonly></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <!--  change col-lg-10 to col-lg-8                  -->
                        <textarea placeholder="Saturday Entry" name="satEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250" readonly></textarea>
                    </div>                    
                                                                
                    <div class="col-lg-10 mt-2 mb-3">
                        <textarea placeholder="Week Entry" name="week_entry" class="form-control" id="exampleFormControlTextarea1" rows="8" maxlength="1000" readonly></textarea>
                    </div>
                    
                    
                    <div class="col-lg-10">
                        <p> Images should go here </p>
                    </div>
                    
                    <div class="col-lg-12 font-weight-light">
                        <hr>
                    </div>
                    
                    
                    <div class="col-lg-10">
                        <span title="YOU CAN ONLY VIEW NOT EDIT">
                            <textarea placeholder="Enter your comments here" name="field_supComments" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </span>
                    </div>
                    
                    <div class="col-lg-2 text-center">
                        <label>Verification Status: </label>
                        <span title="Field/Industrial Supervisor">
                            <textarea id="industrial_verify" name="isupComments" class="col-lg-5" id="exampleFormControlTextarea1" rows="1" style="background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;" readonly >FS</textarea>
                        </span>
                        
                        <span title="Institute Supervisor">
                            <textarea id="institute_verify" name="isupComments" class="col-lg-5" id="exampleFormControlTextarea1" rows="1" style="background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;" readonly>IS</textarea>
                        </span>
                    </div>
                    
                    <div class="col-lg-12 mt-2 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check the box to verify these entries</label>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 mt-3 text-center mb-3 ml-auto mr-auto">
                        <span title="Click this button if verification is done">
                            <button type="submit" class="btn btn-success col-lg-5" name="daily_upload" style="width:100%; color: white;">
                            UPDATE DATA ... </button> <!-- Work on the data-toggle attributes -->
                        </span>
                    </div>
<!--
                    <div class="col-lg-2 mt-1 ml-auto mr-auto">
                        <button type="submit" class="btn btn-danger" name="daily_upload">
                        UPLOAD </button>
                    </div>
-->
                </div>
            </form>
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
















