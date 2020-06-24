<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="mt-5" id="content3"> 
<div class="container-fluid mt-5">
    <div class="row mt-5">
        <div class="col-lg-7 col-12 mr-auto ml-auto mt-2" style="color:white; background-color: #306FA0; height: 60px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <div class="text-center pt-3" style="font-size: 17px;">
                <p><span style="color:white;">FILL YOUR IPT INFO </span> </p>                 
            </div>              
        </div>
        
        
        <div class="col-lg-7 col-12 ml-auto mr-auto" style="border: 2px solid rgba(48, 111, 160, 0.6); border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;" id='location_details'>
            <form method="post" action="../phpIncludes/submit_arrival.inc.php">
                <div class="form-group">
                    <div class="row d-flex justify-content-center">
                        
                        <div class="col-lg-5 col-12 mt-4">
                            <label class='' for='exampleFormControlTextarea1' id='label-text'>IPT session starts on: </label>
                            <span title='IPT starts on'>
                                <input type='date' class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Location Description" value="">
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-4">
                            <label class='' for='exampleFormControlTextarea1' id='label-text'>IPT session ends on: </label>
                            <span title='IPT ends on'>
                                <input type='date' class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Location Description" value="">
                            </span>
                        </div>
                        
                        <div class="col-lg-10 col-12 mt-2">
                            <span title='Company Name'>
                                <textarea type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Company Name" value="" rows="1" maxlength="100"></textarea>
                            </span>
                        </div>
                        
                        <div class="col-lg-10 col-12 mt-2">
                            <span title='Company Address'>
                                <textarea type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Company Address" value="" rows="1" maxlength="200"></textarea>
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-2">
                            <span title='Supervisor name'>
                                <textarea type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder='Supervisor name' value="" rows="1" maxlength="100"></textarea>
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-2">
                            <span title='Supervisor Phone Number'>
                                <input type="number" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Phone Number" value="" rows="1" maxlength="15">
                            </span>
                        </div>
                        
                        <div class="col-lg-10 col-12 mt-2">
                            <span title='Description on IPT location'>
                                <textarea type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Location Description" value="" rows="3" maxlength="1000"></textarea>
                            </span>
                        </div>
                        
                        <div class="col-lg-10">
                        <hr>
                        </div>
                        
                        <div class="col-lg-10 col-12">
                            <span title='EXACT IPT LOCATION, MAP COORDINATES (N/S, E,W)'>
                                <textarea type="text" class="form-control" id="input" aria-describedby="emailHelp" name="loc_coodinates" placeholder="LOCATION COORDINATES" value="" rows="1" maxlength="50"></textarea>
                            </span>
                            
                            <div id="map" class="mt-3" style="border: 1px solid #306FA0">
                                <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="600" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=-6.800902%2C%2039.253313&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
<!--                                <a href="https://www.embedgooglemap.net/en/">googlemap.net</a>-->
                                </div>
                                
                                <style>.mapouter{position:relative;}.gmap_canvas {overflow:hidden;background:none!important;}
                                </style>
                                </div>
                                
                                
                            </div>
                            
                            <script>//-6.800902, 39.253313

                            </script>
                            
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
















