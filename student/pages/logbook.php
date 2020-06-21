<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-8 col-12 ml-auto mr-auto" style="border: 1px solid #306FA0; border-radius:10px;">
            <?php
                    $requestUrl = $_SERVER ['REQUEST_URI'];
                    $urlComponents = explode ('/', $requestUrl);
                     
                    $dot = explode ('.', $urlComponents[4]);
//                    echo $urlComponents[4]; //logbook.php?2
                    $dot_len = count($dot);
//                    echo $dot[1][4]; //shows the number selected
                    $get_no = explode ('?', $dot[1]); //$dot[1] = php?2
            
                     //final number selected by the user
//                    echo $selected_no;
                    
                    
                    if ($dot[1] == 'php'){
                        //empty form goes in here
                        include 'empty_form.php';
                        
                        
                    }else{
                        //form with the selected week number goes in here
                        $current_userID = $_SESSION ['StudentID'];
                        $selected_no = $get_no[1];
                        $_SESSION['student_weekSelection'] = $selected_no;
                        $getEntries = "SELECT * FROM logbook_entries WHERE userID = '$current_userID' AND weekNumber = '$selected_no'";
                        $getRes = $conn -> query($getEntries);
                        $getRow = $getRes -> fetch_assoc();
                        
                        include 'filled_form.php';
                        
                        
//                        echo $selected_no;
                    }

            
            
            
            ?>
            
<!--
            <form method='post' action='../phpIncludes/logbook_submission.inc.php'>
                <div class='row mt-3' style='font-size:14px;' id='dayinput'>
                    <div class='col-lg-2 col-4'>
                        <label for='exampleFormControlTextarea1'>Week Number: </label>

                        <div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle col-lg-9' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <span class="float-left">Pick</span>
                            </button>

                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <?php
                                
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

                                ?>

                            </div>
                        </div> 
                        
                    </div>
                    
                    
                    <div class='col-lg-3 ml-auto'>
                        <label class='' for='exampleFormControlTextarea1'>Date the week starts (Mon): </label>
                        <input placeholder='DATE' type='text' name='startDate' class='form-control' onfocus='(this.type='date')'>
                    </div>
                    
                    <div class='col-lg-3 mr-auto'>
                        <label class='' for='exampleFormControlTextarea1'>Date the week ends (Fri or Sat): </label>
                        <input placeholder='DATE' type='text' name='endDate' class='form-control' onfocus='(this.type='date')'>
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
                        <textarea placeholder='Monday Entry' name='monEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'></textarea>
                    </div>

                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Tuesday Entry' name='tueEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'></textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Wednesday Entry' name='wedEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'></textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Thursday Entry' name='thurEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'></textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Friday Entry' name='friEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'></textarea>
                    </div>
                    
                    <div class='col-lg-10 mt-2'>
                        <textarea placeholder='Saturday Entry' name='satEntry' class='form-control' id='exampleFormControlTextarea1' rows='1' maxlength='250'></textarea>
                    </div>                    
                                                
                    <div class='col-lg-2 mt-2 text-center'>
                        <button type='submit' class='btn col-lg-8' name='daily_upload' style='width:100%; color: white; background-color: #4D87B4'>
                            UPLOAD </button>
                    </div>
                    
                    <div class='col-lg-4 mt-2'>
                        <a href='#' onclick='weekly_visible'> Click Here for Week Entry ><span> </span></a>
                    
                    </div>
                    
                    <div class='col-lg-12 font-weight-light'>
                        <hr>
                    </div>
                    
                    <div class='col-lg-10 mb-3'>
                        <textarea placeholder='Week Entry' name='week_entry' class='form-control' id='exampleFormControlTextarea1' rows='8' maxlength='1000'></textarea>
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
                    
                    <script>
                        $('#inputGroupFile01').on('change',function(){
                            var fileName = $(this).val();
                            $(this).next('.custom-file-label').html(fileName);
                        })
                    </script>
                    
                    <div class='col-lg-10 mb-3'>
                        <span title='YOU CAN ONLY VIEW NOT EDIT'>
                            <textarea placeholder='Industrial Supervisor Comments (Read Only)' name='field_supComments' class='form-control' id='exampleFormControlTextarea1' rows='2' readonly></textarea>
                        </span>
                    </div>
                    
                    <div class='col-lg-2 text-center'>
                        <label>Verification Status: </label>
                        <span title='Field/Industrial Supervisor'>
                            <textarea id='industrial_verify' name='isupComments' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly >FS</textarea>
                        </span>
                        
                        <span title='Institute Supervisor'>
                            <textarea id='institute_verify' name='isupComments' class='col-lg-5' id='exampleFormControlTextarea1' rows='1' style='background-color: #E54128; text-align:center; color:white; vertical-align: middle; border: 1px solid #306FA0; border-radius:8px;' readonly>IS</textarea>
                        </span>
                    </div>
                </div>
            </form>
-->
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
















