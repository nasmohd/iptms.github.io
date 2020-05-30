<?php
    include '../DBconnection.php';

?>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A website for simplified Information Management during IPT sessions for Students and Supervisors"/>
    <meta name="author" content="Nassor Mohamed Suleiman">
    <meta name="keywords" content="IPT sessions, Management System">
    
    <title> IPT Management System  </title>
    
    <!-- Add tab icon -->
    <link rel="icon" href="../img/logo.png">
    
    
    
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    
<!--    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css" type="text/css">-->
    
    <!-- css file from Bootstrap that will be used -->
    <link rel="stylesheet" href="../styles/signup_style.css" type="text/css">

<!--    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    </head>


<body>   
    
<!--    <div class="container-fluid" id="div_nav"> -->
        
<div class="container-fluid" id="div_nav">
    <div class="row">    
        <div class="col d-flex justify-content-center" style="position:relative;" id="home_link">
            
            <a class="" href="#" style="color:white; position:relative;">
                <img src="../img/logo7.png" class="img-fluid" style="width: 55px; height: 50px;"/>
                    Management System
            </a> 
        </div>
            
    </div>
</div>
<!--    <br/> <br/> -->
 

<div class="container mt-3">
    <div class="row">
<!--        <div class="col-lg-4"></div>-->        
<!--        <div class="col-lg-7 col-12 ml-auto mr-auto">-->
        <div class="col-lg-4 col-10 mr-auto ml-auto" style="color:white; background-color: #306FA0; height: 60px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <div class="text-center pt-3" style="font-size: 17px;">
                <p> STUDENT SIGN UP </p>
                    
            </div>
                        
        </div>
    </div>
    
    
    
    <div class="row">
<!--        <div class="col-lg-4"></div>-->
        
        <div class="col-lg-4 col-10 ml-auto mr-auto mb-3" id="loginForm"  style="border: 2px solid rgba(48, 111, 160, 0.6);  border-bottom-left-radius: 8px;
                    border-bottom-right-radius: 8px;">
            
            <form method="post" action="../phpIncludes/signup.inc.php">
                <div class="form-group"> <!-- style="border:3px solid rgba(48, 111, 160, 0.4)" -->
<!--                #306FA0-->
                                
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-11 col-12 mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="firstname" placeholder="First Name">
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="lastname" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-11 col-12 mt-2">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="regNo" placeholder="Reg. Number">
                                </div>

                                <div class="col-6">
                                    <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="course" placeholder="Course">
                                </div>

        <!--
                            <div class="col-6 dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Course <b class ="caret"></b> </a>
                                <ul class="dropdown-menu">
                                <li><a href="#">COE</a> </li>
                                <li><a href="#">IT</a> </li>
                                <li><a href="#">MFT</a> </li>
                                </ul>

                                    </div>            
        -->
                            </div>
                        </div>


                        <div class="col-lg-11 col-12 mt-2">
                            <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="email" placeholder="Email Address">
                        </div>

                        <div class="col-lg-11 col-12 mt-2">
                            <input type="text" class="form-control" id="input" aria-describedby="emailHelp" name="phonenumber" placeholder="Phone Number">
                        </div>

                        <div class="col-lg-11 col-12 mt-2">
                            <input type="password" class="form-control input-sm" id="input" name="pwd" placeholder="Login Password">
                        </div>

                        <div class="col-lg-11 col-12 mt-2">
                            <input type="password" class="form-control input-sm" id="input" name="pwd" placeholder="Confirm Password">
                        </div>


                        <div class="col-lg-11 col-12 mt-2 mb-3">
                            <button type="submit" id="input" class="btn col-12" style="background-color: #306FA0; color:white" name="login"> SIGN UP</button>
                        </div>


        <!--
                        <div class="col-lg-10">
                            <div class="row" id="loginlinks" style="color:#306FA0;" >
                                <div class="col-lg-12 mt-3">
                                <a href="#" class="float-right"> Sign Up (Create Account) </a>
                                </div>

                                <div class="col-lg-12 mb-5">
                                <a href="#" class="float-right"> Forgot Password </a>
                                </div>

                            </div>
                        </div>
        -->
                    </div>
                </div>
            </form>
        </div>        
<!--        <div class="col-lg-4"></div>-->
    </div>
</div> 
    
<div class="container">
    <div class="row"> 

<!-- #306FA0 -->

<!--
<ul class="nav nav-pills mb-3 nav-tabs" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Student</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
        Institute Supervisor </a>
      
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Industrial Supervisor</a>
  </li>
</ul>
-->
        
<!--
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>
-->
    
    </div>
    </div>

<!-- End of the container-fluid class -->
    
    
<!--    Footer -->    
<?php 
    include "../phpIncludes/footer.php";

    ?>

<!--    <script src="../js/popper.min.js"></script>-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <!-- Optional jQuery file that will be used -->
    <script src="../js/bootstrap.min.js"></script>

    
    </body>
    
    
</html>
