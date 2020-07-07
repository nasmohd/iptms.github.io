<?php
    include '../phpIncludes/header.php';
    $userID = $_SESSION['StudentID'];
    $get_ipt_info = "SELECT * FROM student_location_info WHERE studentID = $userID";
    $run_ipt_info = $conn -> query ($get_ipt_info);
    $ipt_res = $run_ipt_info -> fetch_assoc();
    $get_row = mysqli_num_rows($run_ipt_info);


?>

<!--<div id="content">-->
<div class="mt-2" id="content3"> 
<div class="container-fluid mt-4">
    <div class="row mt-2">
        <div class="col-lg-7 col-12 mr-auto ml-auto mt-2" style="color:white; background-color: #306FA0; height: 60px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <div class="text-center pt-3" style="font-size: 17px;">
                <p><span style="color:white;">FILL YOUR IPT INFO </span> </p>                 
            </div>              
        </div>
        
        
        <div class="col-lg-7 col-12 ml-auto mr-auto" style="border: 2px solid rgba(48, 111, 160, 0.6); border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;" id='location_details'>
            <form method="GET" action="../phpIncludes/location_submission.inc.php">
                <div class="form-group">
                    <div class="row d-flex justify-content-center">
                        
                        <div class="col-lg-5 col-12 mt-4">
                            <label class='' for='exampleFormControlTextarea1' id='label-text'>IPT session starts on: </label>
                            <span title='IPT starts on'>
                               <?php
                                echo "
                                <input type='date' class='form-control' id='input' aria-describedby='emailHelp' name='startDate' value='".$ipt_res['starting_date']."'>
                                    ";
                                ?>
                        
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-4">
                            <label class='' for='exampleFormControlTextarea1' id='label-text'>IPT session ends on: </label>
                            <span title='IPT ends on'>
                               <?php
                                echo "
                                <input type='date' class='form-control' id='input' aria-describedby='emailHelp' name='endDate' value='".$ipt_res['ending_date']."'>
                                    ";
                                ?>
                                
                            </span>
                        </div>
                        
                        <div class="col-lg-10 col-12 mt-2">
                            <span title='Company Name'>
                               <?php
                                echo "
                                <textarea type='text' class='form-control' id='input' aria-describedby='emailHelp' name='coName' placeholder='Company Name' value='' rows='1' maxlength='100'>".$ipt_res['CompanyName']."</textarea>
                                    ";
                                ?>
                               
                                
                            </span>
                        </div>
                        
                        <div class="col-lg-10 col-12 mt-2">
                            <span title='Company Address'>
                               <?php
                                echo "
                                <textarea type='text' class='form-control' id='input' aria-describedby='emailHelp' name='coAddress' placeholder='Company Address' value='' rows='1' maxlength='200'>".$ipt_res['CompanyAddress']."</textarea>
                                    ";
                                ?>
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-2">
                            <span title='Supervisor name'>
                               <?php
                                echo "
                                <textarea type='text' class='form-control' id='input' aria-describedby='emailHelp' name='supName' placeholder='Supervisor name' value='' rows='1' maxlength='100'>".$ipt_res['indSup_name']."</textarea>
                                    ";
                                ?>
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-2">
                            <span title='Supervisor Phone Number'>
                               <?php
                                echo "
                                <textarea type='number' class='form-control' id='input' aria-describedby='emailHelp' name='supPhoneNumber' placeholder='Phone Number' value='' rows='1' maxlength='15'>".$ipt_res['indSup_phoneNumber']."</textarea>
                                    ";
                                ?>
                            </span>
                        </div>
                        
                        <div class="col-lg-10 col-12 mt-2">
                            <span title='Description on IPT location'>
                               <?php
                                echo "
                                <textarea type='text' class='form-control' id='input' aria-describedby='emailHelp' name='coLocation_Desc' placeholder='Location Description' value='' rows='1' maxlength='15'>".$ipt_res['LocationDescription']."</textarea>
                                    ";
                                ?>
                            </span>
                        </div>
                        
                        <div class="col-lg-10">
                        <hr>
                        </div>
                        
                        <style>
                            #input {font-size: 14px;}
                        </style>
                        
                        <div class="col-lg-10 col-12">
                           <div class="row">
                           <div class="col-lg-10 ml-auto">
                            <span title='EXACT IPT LOCATION, MAP COORDINATES (N/S, E,W)'>
                              <?php
                                
                                if ($ipt_res['locationCoord'] == ''){
                                    echo "
                                <textarea type='text' class='form-control mb-2 coordValue' id='input' aria-describedby='emailHelp' name='loc_coodinates' placeholder='Location Coordinates' value='' rows='2' maxlength='50'></textarea>
                                    ";
                                
                                }
                                
                                if ($ipt_res['locationCoord'] != ''){
                                    echo "
                                <textarea type='text' class='form-control mb-2 coordValue' id='input' aria-describedby='emailHelp' name='loc_coodinates' placeholder='Location Coordinates' value='' rows='2' maxlength='50'>".$ipt_res['locationCoord']."</textarea>
                                    ";
                                }
                                ?>
                               
                            </span>
                            
                        </div>
                           
                        <div class="col-lg-2 ml-auto mt-2">
                           <span title="View the coordinates on the map below">
                                <button class="btn btn-info" formaction="https://maps.google.co.tz/maps" target="_blank"><span id='input'>Google Maps</span></button>
                            </span>
                        </div>
                          
                        <div class="col-lg-12 mt-2">
                           <span title="View the coordinates on the map below">
                                <a class="" href="#" id="loc_click" onclick="loc(); return false;"><span id='input2' class="chn">Click to view Below</span></a>
                            </span>
                        </div>
                        
                        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                           
                           
                        <script> 
                        function loc(){
                        $(document).ready(function () { 

                        //This function called when the button is clicked 
                        $("#loc_click").click(function () { 

                        // val() method is used to get the values from  
                        // textarea and stored in txt variable 
                        var txt = $(".coordValue").val();
                        var loc_separate = txt.split(', ');
                        var lat = loc_separate[0];
                        var lon = loc_separate[1];

//                            document.getElementById("#loc_click").href = "?1#show_map";
//                        alert(txt);
                        window.location.href = "?1";
                        }); 
                        });
                        }
                        </script>
                                
                        
                        
                        <style>
                            #input2 {
                                font-size:14px;
                                color: #17A2B8;
                                
                            }
                            
                            #input2:hover{
                                color:#306FA0;
                                text-decoration: underline;
                            }
                               
                        </style>
                            
                            
                            
                            <script>//-6.800902, 39.253313

                            </script>
                            
                        </div>    </div> 
                        
                        <div class="col-lg-10 col-12" id="show_map">
                            <div id="map" class="mt-3" style="border: 1px solid #306FA0">
                                <div class="mapouter">
                                
                                <?php
                                    $requestUrl = $_SERVER ['REQUEST_URI'];
                                    $urlComponents = explode ('/', $requestUrl);

                                    $dot = explode ('.', $urlComponents[4]); //$dot = Array ( [0] => reporting [1] => php?1 )
//                                    print_r ($dot);

                                    
                                    if (($dot[1] == 'php') && ($get_row == 0)){ //no results, show normal table
//                                        $separateCoords = explode (', ', $ipt_res['locationCoord']);
//                                        $lat = $separateCoords[0];
//                                        $lon = $separateCoords[1];
//                                            echo $separateCoords[0];

                                        //-6.815050, 39.279569 || %2C%20 for comma?
                                        echo "
                                            <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=-6.815050%2C%2039.279569&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                            </div>
                                        ";
                                    }
                                    
                                    if (($dot[1] == 'php') && ($ipt_res['locationCoord'] == '')){ //http://localhost/UNI_3rd_year/student/pages/reporting.php
//                                        $separateCoords = explode (', ', $ipt_res['locationCoord']);
//                                        $lat = $separateCoords[0];
//                                        $lon = $separateCoords[1];

                                       // -6.815050, 39.279569 || %2C%20 for comma?
                                        echo "
                                            <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=-6.815050%2C%2039.279569&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                            </div>
                                        ";
                                        
//                                        echo "
//                                            <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=".$lat."%2C%20".$lon."&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
//                                            </div>
//                                        ";
                                    }
                                    
                                    if ($dot[1] != 'php'){
                                        $qn = explode ('?', $dot[1]); //php?1
                                        
//                                        if (isset('loc_coodinates')){
                                        if ($qn[1] != ''){ //link has been pressed
                                            $changeCoord = "UPDATE student_location_info SET location locationCoord = '' WHERE studentID = $userID";
                                            
//                                            echo "True";
                                            $separateCoords = explode (', ', $ipt_res['locationCoord']);
                                            $lat = $separateCoords[0];
                                            $lon = $separateCoords[1]; //HERE
//                                            echo $separateCoords[0];
                                            
                                            //-6.815050, 39.279569 || %2C%20 for comma?
                                            echo "
                                                <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=".$lat."%2C%20".$lon."&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                                </div>
                                            ";
                                        }                                     
//                                        $qn_count = count($qn);
                                    }
                                    
                                ?>
<!--
                                <div class="gmap_canvas"><iframe width="600" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=-6.800902%2C%2039.253313&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
-->
                                <!-- -6.815050, 39.279569 || %2C%20 for comma?-->
<!--THI BELOW
                                    <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=-6.815050%2C%2039.279569&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>

                                    </div>
-->
                                <!--                                <a href="https://www.embedgooglemap.net/en/">googlemap.net</a>-->
                                    <style>
                                        .mapouter{position:relative;}
                                        .gmap_canvas {overflow:hidden;background:none!important;}
                                    </style>
                                </div>
                                
                                
                            </div>
                            
                            
                        </div>                    
                        
                        <div class="col-lg-3 col-12 mt-3 ml-2 ml-auto mr-auto">
                            <button class="btn" type="submit" id='upload_btn'>SUBMIT</button>
                        </div>    
                    </div>
                </div>
                
                <style>
                    textarea {resize: none;}
                    .form-group div #label-text {font-size: 14px;}
                    div #upload_btn {width:100%; color: white; background-color: #306FA0}
                    div #upload_btn:hover {background-color: #598BB3;}
                    
                    #map{
                        
                    }
                </style>
                
            </form>
        </div>
    </div>    
</div>
         
<?php
    include '../phpIncludes/footer2.php';
    
?>
















