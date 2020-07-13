<?php
    include '../phpIncludes/header.php';
    $userID = $_SESSION['StudentID'];
    $get_ipt_info = "SELECT * FROM student_location_info WHERE studentID = $userID";
    $run_ipt_info = $conn -> query ($get_ipt_info);
    $ipt_res = $run_ipt_info -> fetch_assoc();
    $get_row = mysqli_num_rows($run_ipt_info);

    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl); 

    $dot = explode ('.php', $urlComponents[4]); //$urlComponents[4] = reporting.php?lat=-6.815050andlon=39.279569
    
    if ($dot[1] != ''){ //means button has been clicked, dot = Array ( [0] => reporting [1] => ?lat=-6.815050andlon=39.279569 )
        //further division $dot[1]
        $loc = explode ('?lat=', $dot[1]); //$loc = Array ( [0] => [1] => -6.815050andlon=39.279569 )
        $loc2 = explode ('andlon=', $loc[1]);
        $lat = $loc2[0];
        $lon = $loc2[1];
        
//        $_SESSION ['loc'] = $_GET['loc_coodinates'];
//        echo ($_SESSION['loc']);
//        print_r ($loc);
    }
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
            <form method="POST" action="../phpIncludes/location_submission.inc.php?1" autocomplete="on">
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
                                <textarea type='text' class='form-control' id='input' aria-describedby='emailHelp' name='coLocation_Desc' placeholder='Location Description' value='' rows='1' maxlength='100'>".$ipt_res['LocationDescription']."</textarea>
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
                           <div class="col-lg-9 mr-auto">
                            <span title='EXACT IPT LOCATION, MAP COORDINATES (N/S, E,W)'>
                              <?php
                                
                                if ($ipt_res['locationCoord'] == ''){
                                    echo "
                                <textarea type='text' class='form-control mb-2 coordValue' id='input' aria-describedby='emailHelp' name='loc_coodinates' placeholder='Location Coordinates' value='' rows='2' maxlength='50'></textarea>
                                    ";
                                
                                }
                                
                                if ($ipt_res['locationCoord'] != ''){
                                    echo "
                                <textarea type='text' class='form-control mb-2 coordValue' id='input' aria-describedby='emailHelp' name='loc_coodinates' placeholder='Location Coordinates' value='' rows='2' maxlength='50'>".$ipt_res['test_location']."</textarea>
                                    ";
                                }
                                ?>
                               
                            </span>
                            
                        </div>
<!--                          <i class="fa fa-map-marker" aria-hidden="true"></i>-->
                           
                        <div class="col-lg-3 ml-auto mt-3"> <!--  style="border: 1px solid #306FA0;" -->
                           <span title="View the coordinates on the map below">
                                <a class="float-left" href="https://maps.google.co.tz/maps" ><i class="fa fa-map-marker" aria-hidden="true" style="color:#EA4335;"></i><span id='input' class='ml-2'>Google Maps</span></a>
<!--                                <button class="btn btn-info" formaction="https://maps.google.co.tz/maps" target="_blank"><span id='input'>Google Maps</span></button>-->
                            </span>
                        </div>
                          
                        <div class="col-lg-12 mt-2">
                           <span title="View the coordinates on the map below">
<!--                                <a class="" id="loc_click" onclick="loc()"><span id='input2' class="chn">Click to view Below</span></a>-->
                                <button class="btn99" type="submit" name="view_btn"><span id='input2' class="chn">Click to view Below</span></button>
                            </span>
                        </div>
                        
                        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
                           
                           
                        <script> 
                        $(document).ready(function () { 
                        $("#loc_click").click(function () { //This function called when the button is clicked 
                        var txt = $(".coordValue").val(); // val() method is used to get the values from 
                        var loc_separate = txt.split(', '); // textarea and stored in txt variable 
                        var lat = loc_separate[0];
                        var lon = loc_separate[1];
//                            document.getElementById("#loc_click").href = "?1#show_map";
//                        alert(txt);
                        window.location.href = "?lat=" + lat + "andlon=" + lon + "#show_map";
                        }); 
                        });
                        </script>
                                
                        
                        <style>
                            .btn99{
                                background: none!important;
                                border: none;
                                padding: 0!important;
                                /*optional*/
                                font-family: arial, sans-serif;
                                /*input has OS specific font-family*/
                                color: #069;
                                text-decoration: none;
                                font-size:14px;
                                cursor: pointer;
                            }
                            
                            #input2 {
                                font-size:14px;
                                color: #17A2B8;  
                            }
                            
                            #input2:hover{
                                color:#306FA0;
                                text-decoration: underline;
                            }                        
                        </style>
  
                        </div>    </div> 
                        
                        <div class="col-lg-10 col-12" id="show_map">
                            <div id="map" class="mt-3" style="border: 1px solid #306FA0">
                                <div class="mapouter">
                                    <?php
                                        if ($get_row == 0){
                                        echo "
                                            <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=-6.800902%2C%2039.253313&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                            </div>
                                        ";
                                        }
                                    
                                        if ($get_row != 0){
                                            $separate_loc = explode (', ', $ipt_res['test_location']);
                                            $lat = $separate_loc[0];
                                            $lon = $separate_loc[1];
//                                            echo $lon;
                                        echo "
                                            <div class='gmap_canvas'><iframe width='600' height='400' id='gmap_canvas' src='https://maps.google.com/maps?q=".$lat."%2C%20".$lon."&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                                            </div>
                                        ";                                     
                                        }
                                    ?>
                                
<!--
                                <div class="gmap_canvas"><iframe width="600" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=-6.800902%2C%2039.253313&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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
                            <button class="btn" type="submit" name='submit_btn' id='upload_btn'>SUBMIT</button>
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
















