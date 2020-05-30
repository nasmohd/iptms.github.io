<?php
    include '../phpIncludes/header.php';

?>


<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-10 col-12 ml-auto mr-auto">
            
            <form method="post" action="../phpIncludes/daily_upload.inc.php">
                <div class="row" style="font-size:14px;" id="dayinput">
                    <div class="ml-5 col-lg-2 col-4">
                        <label for="exampleFormControlTextarea1">Week Number: </label>
                        <input placeholder="Week 1 to 10" name="weekNumber" type="text" id="weekinput" class="form-control" style=" border: 1px solid #306FA0">  
                    </div>
                    
                    <div class="col-lg-3 mr-auto"></div>
                    
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
                    
                    <div class="ml-auto col-lg-8 col-6 mt-4">
                        <label>FILL OUT DAILY ENTRIES BELOW: </label>
                    </div>
                    
                    <div class="col-lg-3 mr-auto mt-4">
                         <label class="" for="exampleFormControlTextarea1">Select Date: </label>
                    </div>

                    <div class="ml-auto col-lg-8">
                        <textarea placeholder="Monday Entry" name="monEntry" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    
                    <div class="col-lg-3 col-6 mr-auto">
                        <input placeholder="DATE" type="text" name="monDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <div class="ml-auto col-lg-8 mt-2">
                        <textarea placeholder="Tuesday Entry" name="tueEntry" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    
                    <div class="col-lg-3 col-6 mt-2 mr-auto">
                        <input placeholder="DATE" type="text" name="tueDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <div class="ml-auto col-lg-8 mt-2">
                        <textarea placeholder="Wednesday Entry" name="wedEntry" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    
                    <div class="col-lg-3 col-6 mt-2 mr-auto">
                        <input placeholder="DATE" type="text" name="wedDate" class="form-control" onfocus="(this.type='date')">
                    </div>                    
                    
                    <div class="ml-auto col-lg-8 mt-2">
                        <textarea placeholder="Thursday Entry" name="thurEntry" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    
                    <div class="col-lg-3 col-6 mt-2 mr-auto">
                        <input placeholder="DATE" type="text" name="thurDate" class="form-control" onfocus="(this.type='date')">
                    </div>                    
                    
                    <div class="ml-auto col-lg-8 mt-2">
                        <textarea placeholder="Friday Entry" name="friEntry" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    
                    <div class="col-lg-3 col-6 mt-2 mr-auto">
                        <input placeholder="DATE" type="text" name="friDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <div class="ml-auto col-lg-8 mt-2">
                        <textarea placeholder="Saturday Entry" name="satEntry" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    
                    <div class="col-lg-3 col-6 mt-2 mr-auto">
                        <input placeholder="DATE" type="text" name="satDate" class="form-control" onfocus="(this.type='date')">
                    </div>
                    
                    <div class="col-lg-2 mt-3 ml-auto mr-auto">
                        <button type="submit" class="btn btn-success" name="daily_upload">
                        UPLOAD </button>
                    </div>
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
















