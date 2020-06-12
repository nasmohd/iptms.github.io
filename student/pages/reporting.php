<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-7 col-12 mr-auto ml-auto" style="color:white; background-color: #306FA0; height: 60px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <div class="text-center pt-3" style="font-size: 17px;">
                <p> NOTIFY THE INSTITUTE ON YOUR IPT LOCATION </p>                 
            </div>              
        </div>
        
        
        <div class="col-lg-7 col-12 ml-auto mr-auto" style="border: 2px solid rgba(48, 111, 160, 0.6); border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;" id='location_details'>
            <form method="post" action="phpIncludes/">
                <div class="form-group">
                    <div class="row d-flex justify-content-center">
                        
                        <div class="col-lg-5 col-12 mt-4">
                            <label class='' for='exampleFormControlTextarea1' id='label-text'>IPT session starts on: </label>
                            <span title='Description on IPT location'>
                                <input type='date' class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Location Description" value="">
                            </span>
                        </div>
                        
                        <div class="col-lg-5 col-12 mt-4">
                            <label class='' for='exampleFormControlTextarea1' id='label-text'>IPT session ends on: </label>
                            <span title='Description on IPT location'>
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
                            <div id="map">
                                <span title='EXACT MAP LOCATION'>
                                    <textarea type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Location Description" value="" rows="1" maxlength="1000"></textarea>
                                </span>
                            </div>
                            
                            <script>
                                // Initialize and add the map
                                function initMap() {
                                  // The location of Uluru
                                  var uluru = {lat: -25.344, lng: 131.036};
                                  // The map, centered at Uluru
                                  var map = new google.maps.Map(
                                      document.getElementById('map'), {zoom: 4, center: uluru});
                                  // The marker, positioned at Uluru
                                  var marker = new google.maps.Marker({position: uluru, map: map});
                                }
                            </script>
                        </div>
                        
                        <style>
                            #map{
                                width: 100%;
                                height: 400px;
                                background-color: grey;
                            }
                        
                        
                        </style>
            
                    </div>
                </div>
                
                <style>
                    textarea {resize: none;}
                    .form-group div #label-text {font-size: 14px;}
                
                </style>
                
            </form>
        </div>
    </div>    
</div>

<style>
    #location_details{
/*
        background-image: url(../../img/DIT_logo.png);
        opacity: 0.6
*/
    }


</style>

<!--</div>-->
<!--</div>-->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

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
















