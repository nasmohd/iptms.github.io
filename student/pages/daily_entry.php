<?php
    include '../phpIncludes/header.php';

?>


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-10 col-12 ml-auto mr-auto" style="border: 2px solid #306FA0; border-radius:10px;">
            
            <form method="post" action="../phpIncludes/daily_upload.inc.php">
                <div class="row mt-3" style="font-size:14px;" id="dayinput">
                    <div class="col-lg-2 col-4">
                        <label for="exampleFormControlTextarea1">Week Number: </label>
                        <input placeholder="Week 1 to 10" name="weekNumber" type="text" id="weekinput" class="form-control" style=" border: 1px solid #306FA0">  
                    </div>
                    
                    <div class="col-lg-3 ml-auto">
                        <label class="" for="exampleFormControlTextarea1">Date the week Starts: </label>
                        <input placeholder="DATE" type="text" name="startDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <div class="col-lg-3 mr-auto">
                        <label class="" for="exampleFormControlTextarea1">Date the week Ends: </label>
                        <input placeholder="DATE" type="text" name="endDate" class="form-control" onfocus="(this.type='date')">
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
                        <textarea placeholder="Monday Entry" name="monEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250"></textarea>
                    </div>
                    
<!--
                    <div class="col-lg-3 col-6 mr-auto">
                        <input placeholder="DATE" type="text" name="monDate" class="form-control" onfocus="(this.type='date')">
                    </div>
--> 
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Tuesday Entry" name="tueEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250"></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Wednesday Entry" name="wedEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250"></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Thursday Entry" name="thurEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250"></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <textarea placeholder="Friday Entry" name="friEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250"></textarea>
                    </div>
                    
                    <div class="col-lg-10 mt-2">
                        <!--  change col-lg-10 to col-lg-8                  -->
                        <textarea placeholder="Saturday Entry" name="satEntry" class="form-control" id="exampleFormControlTextarea1" rows="1" maxlength="250"></textarea>
                    </div>
                                        
                    <div class="col-lg-2 mt-2">
                        <button type="submit" class="btn font-weight-bold" name="daily_upload" style="width:100%; background-color: #306FA0; color: white;">
                            UPLOAD </button>
                    </div>
                    
                    <div class="col-lg-10 mt-2 mb-3">
                        <textarea placeholder="Industrial Supervisor's Comments (IF added)" name="isupComments" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    
                    <div class="col-lg-2 mt-2">
                        <textarea placeholder="Industrial Supervisor's Comments (IF added)" name="isupComments" class="form-control" id="exampleFormControlTextarea1" rows="2" style="background-color: red; text-align:center; color:white; vertical-align: middle;" readonly>NOT YET VERIFIED</textarea>
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

<?php
    include '../phpIncludes/footer2.php';

?>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
-->

    
    </body>
</html>
















