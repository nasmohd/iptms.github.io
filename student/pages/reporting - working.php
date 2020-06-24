<?php
    include '../phpIncludes/header.php';

?>

<!--<div id="content">-->
<div class="mt-5" id="content"> 
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
      
<footer class="footer-black aa-footer mt-5" id="footr">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 mt-3">
            <p class="mt-3" style="color:white;"> &copy; 2020 - IPT Management System </p>
            </div>
        </div>
    </div>
</footer>   

<style>

    #footr{
        background-color: #306FA0; 
        color: white; 
        height: 80px; 
    /*    bottom: 0; */
        width:100%; 
        font-size:15px;
    }


</style>  
                  
</div><!-- end of content class -->

</div><!-- end of the wrapper class -->




<style>

</style>
<!-- For div wrapper from the header -->
           
<div class="overlay"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    
</body>
</html>





<!--
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
-->

    

















