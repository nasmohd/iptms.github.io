<?php
    include '../phpIncludes/header.php';

?>


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-10 col-12 ml-auto mr-auto">
            
            <form method="post">
                <div class="row" style="font-size:14px;">
                    <div class="col-lg-2 col-4">
                        <label for="exampleFormControlTextarea1">Week Number: </label>
                        <input placeholder="Week 1 to 10" name="weekNumber" type="text" id="weekinput" class="form-control" style=" border: 1px solid #306FA0">  
                    </div>
                    
                    <div class="col-lg-3 ml-auto">
                        <label class="" for="exampleFormControlTextarea1">Date the week Starts (MON): </label>
                        <input placeholder="DATE" type="text" name="startDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <div class="col-lg-3 mr-auto">
                        <label class="" for="exampleFormControlTextarea1">Date the week Ends (FRI or SAT): </label>
                        <input placeholder="DATE" type="text" name="endDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <style>
                        #weekinput{
                            font-size: 14px;
                        }
                        
                    
                    </style>
                    
                    <div class="col-lg-10 mt-3">
                        <div class="form-group">
<!--                    <label for="exampleFormControlTextarea1">Logbook Entry: </label>-->
                            
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" style="border: 2px solid #306FA0; resize:none;"></textarea>
                        </div>
                    </div>
                    
<!--
                    <div class="col-lg-2 col-3 ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>
-->
                
                
                </div>

            </form>
        </div>
    </div>    
</div>
    

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
-->

    
    </body>
</html>
















